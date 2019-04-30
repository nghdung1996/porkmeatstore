<?php

namespace App\Http\Controllers\quanly;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
class OrderController extends Controller
{
  function index(){
    $orders = Order::all();
    return view('quanly.order.index',['orders'=> $orders]);
  }

  function editorder($id){
    $order = Order::find($id);
    return view('quanly.order.editorder',['order'=>$order]);
  }

  function posteditorder(Request $request){
    $order = Order::find($request->id);

    if ($request->order_status == 3) {
      $order->delete();
      return redirect('quanly/order/index');
    }else if($request->order_status == 2){
      $user = User::find($order->user_id);
      $user->shopxu += (int) ($order->total_price / 20);
      $user->save();
      $order->order_status = $request->order_status;
      $order->save();
      return redirect('quanly/order/index');
    } 
    else {
      $order->order_status = $request->order_status;
      $order->save();
      return redirect('quanly/order/index');
    }
  }
}
