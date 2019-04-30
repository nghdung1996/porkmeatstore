<?php

namespace App\Http\Controllers;

use App\Order;
use App\LineItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class OrderController extends Controller
{
    function new(){
        return view('pages.checkout');
    }
    function create(Request $request){
        $order = new Order;

        $this->validate($request,
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Nhập tên người nhận',
                'address.required' => 'Nhập địa chỉ người nhận',
                'phone.required' => 'Nhập số điện thoại người nhận',
            ]
        );
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->order_code = $request->order_code;
        $order->user_id = $request->user_id;
        $order->total_price = $request->subtotal;
        $order->description = $request->description;
        
        if ($request->user_id) {
            $user = User::find($request->user_id);
            if ($request->usingShopxu == 'on') {
                $order->total_price = $request->subtotal - $user->shopxu;
                if ($order->total_price <0) {
                    $order->total_price =0;
                }
                $user->shopxu = 0;
            }
            $user->save();
        }

        $order->save();

        foreach (session('cart') as $id => $details) {
            $line_item = new LineItem;
            $line_item->order_id = $order->id;
            $line_item->product_id = $id;
            $line_item->quantity = $details['quantity'];
            $line_item->price = $details['promotionprice']*$details['quantity'];

            $line_item->save();
        }
        $request->session()->forget('cart');
        return redirect('home')->with('success','Đặt hàng thành công');
    }

    function list(){
        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->orderBy('id','desc')->get();
        
        return view('pages.orders_list',['orders'=>$orders]);
    }

    function deleteorder($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('orderslist');
    }
}
