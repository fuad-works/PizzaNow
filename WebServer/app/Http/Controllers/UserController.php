<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function ViewAll($type=1)
  {
    $table = User::where('user_type','=',$type)->get();
    return view('pages.users.viewall')->with('table',$table);
  }

  public function edit($id=0)
  {
    $formAction = route('users-store');
    $formType = 'save';

    $row = User::find($id);
    if($row)
    {
      return view('pages.users.editor', compact('row', 'formType', 'formAction'));
    }
    else
      return view('pages.users.editor', compact('formType', 'formAction'));

    return redirect()->route('users-viewall');
  }


  public function Save(Request $request)
  {
    $user = new User();
    if($request->has('id'))
    {
      if($request->id != 0)
        $user = User::find($request->id);
    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_num = $request->phone_num;
    $user->user_type = $request->user_type;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('users/viewall/'.$user->user_type);
  }

  public function Delete($id)
  {
    $row = User::find($id);
    $type = $row->user_type;
    if($row)
    {
      $row->delete();
    }
    return redirect('users/viewall/'.$type);
  }


}
