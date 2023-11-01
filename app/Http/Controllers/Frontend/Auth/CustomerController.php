<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard(){

        $user_data = Auth::user();
        $order =  Order::where('user_id',$user_data->id)->with('billing', 'orderDetails')->latest('id')->paginate(3);
        return view('frontend.pages.widgets.dashboard',compact('user_data','order'));
    }
}
