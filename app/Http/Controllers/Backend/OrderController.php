<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){

      $order =  Order::with('billing', 'orderDetails')->latest('id')->paginate(15);
      return view('backend.order.orderData',compact('order'));

      


    }
}
