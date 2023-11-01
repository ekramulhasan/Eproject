<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CustomerOrder extends Controller
{
    public function order_index($id){

        $order =  Order::where('user_id',$id)->with('billing', 'orderDetails')->latest('id')->paginate(10);
        return view('backend.order.orderData',compact('order'));
    }
}
