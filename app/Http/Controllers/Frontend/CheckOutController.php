<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Upazila;
use App\Models\District;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\orderRequest;
use App\Http\Controllers\Controller;


class CheckOutController extends Controller
{
    public function checkoutPage(){

        $carts = \Cart::getContent();
        $total_price = \Cart::getSubTotal();
        $district = District::select('id','name','bn_name')->get();

        return view('frontend.pages.widgets.checkoutPage',compact('carts','total_price','district'));

    }


    public function loadAjax($district_id){

        $upazila = Upazila::where('district_id',$district_id)->select('id','name')->get();
        return response()->json($upazila,200);

    }


    public function placeOrder(orderRequest $request){

        dd($request->all());

    }


}
