<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class LoginController extends Controller
{
  public function username()
  {
      return 'username';
  }

  public function New()
  {
    $table = Order::all();
    return view('pages.Products.viewall')->with('table',$table);
  }

  public function All()
  {
    $table = Order::all();
    return view('pages.Products.viewall')->with('table',$table);
  }


}
