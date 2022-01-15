<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function ViewAll()
  {
    $table = Product::all();
    return view('pages.Products.viewall')->with('table',$table);
  }

  public function edit($id=0)
  {
    $formAction = route('products-store');
    $formType = 'save';

    $row = Product::find($id);
    if($row)
    {
      return view('pages.Products.editor', compact('row', 'formType', 'formAction'));
    }
    else
      return view('pages.Products.editor', compact('formType', 'formAction'));

    return redirect()->route('products-viewall');
  }


  public function Save(Request $request)
  {
    $Product = new Product();
    if($request->has('id'))
    {
      if($request->id != 0)
        $Product = Product::find($request->id);
    }

      $img = "";
        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $location = 'assets/images/uploads';
            $file->move($location,$filename);
           // Storage::disk('public')->put($filename, $file);
            $img = $filename;
        }

    $Product->category_id = 1;
    $Product->name = $request->name;
    if($img != "")
      $Product->image = $img;
    $Product->description = $request->description;
    $Product->price = $request->price;
    $Product->save();

    return redirect('products/viewall/');
  }

  public function Delete($id)
  {
    $row = Product::find($id);
    if($row)
    {
      $row->delete();
    }
    return redirect('products/viewall/');
  }
}
