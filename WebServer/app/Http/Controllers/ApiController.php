<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
  public function username()
  {
    return 'username';
  }

  public function get_products()
  {
    $data = Product::all();
    return ['data' => $data];
  }

  public function my_orders()
  {
    if (Auth::check()) {

      $data = Order::with('details')->where('user_id','=',auth()->user()->id)->get();
      return ['data' => $data];

    } else {
      //Not Loged
      $response = [
        'status' => false,
        'message' => 'Login failer!',
        'data' => '32323'
      ];
      return response($response, 201);
    }

  }

  public function order(Request $request)
  {
    if (Auth::check()) {
      //Loged

      $order = new Order();
      $order->user_id = auth()->user()->id;
      $order->order_date = date('Y-m-d');
      $order->status = 1;
      $order->save();

      $order_id = $order->id;

      foreach ($request->details as $detail) {
        $tdetail = new OrderDetail();
        $tdetail->order_id = $order_id;
        $tdetail->product_id = $detail['product_id'];
        $tdetail->quantity = 1;
        $customize = "بدون تخصيص";
        if($detail['customize'] !== null || $detail['customize'] != "" )
          $customize = $detail['customize'];
        $tdetail->customize = $customize;
        $tdetail->save();
      }


      $response = [
        'status' => true,
        'message' => 'Hey Good!',
        'data' => $order_id
      ];
      return response($response, 200);
    } else {
      //Not Loged
      $response = [
        'status' => false,
        'message' => 'Login failer!',
        'data' => $request->order
      ];
      return response($response, 201);
    }

  }


  public function register(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_num = $request->phone_num;
    $user->user_type = 2;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();

    $token = $user->createToken('myapitoken')->plainTextToken;

    $response = [
      'status' => true,
      'message' => 'Hey Good!',
      'data' => [
        'user' => $user,
        'token' => $token
      ]
    ];

    return response($response, 200);
  }

  public function login(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
      $user = User::find(Auth::user()->id);
      $token = $user->createToken('myapitoken')->plainTextToken;

      $response = [
        'status' => true,
        'message' => 'Login successful!',
        'data' => [
          'user' => $user,
          'token' => $token
        ]
      ];
      return response($response, 201);
    } else {
      $response = [
        'status' => false,
        'message' => 'Login failer!',
        'data' => ''
      ];
      return response($response, 201);
    }
  }
}
