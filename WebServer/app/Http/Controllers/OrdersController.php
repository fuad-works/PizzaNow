<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function viewnews()
  {
    $table = Order::where('status','=','1')->with('details')->with('user')->with('details.product')->get();
    return view('pages.orders.viewnews')->with('table',$table);
  }

  public function viewall()
  {
    $table = Order::with('details')->with('user')->with('details.product')->get();
    return view('pages.orders.viewnews')->with('table',$table);
  }

  public function set($id,$to)
  {
    $order = Order::find($id);
    $order->status = $to;
    $order->save();

    $table = Order::with('details')->with('user')->with('details.product')->get();
    return view('pages.orders.viewnews')->with('table',$table);
  }
}
