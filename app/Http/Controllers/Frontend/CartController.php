<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartPage(){

        $items = \Cart::getContent();
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();

       return view('frontend.pages.widgets.shopping-cart',compact('items','subTotal','total'));
    }


    public function addTocart(Request $request){

        // dd($request->all());
        $product_slug = $request->product_slug;
        $product_qty = $request->product_qnty;

        $product = Product::whereSlug($product_slug)->first();

        \Cart::add([

            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $product_qty,
            'attributes' => [

                'product_img' => $product->product_img,
                'weight' => 0,
                'product_stock' => $product->product_stock,

            ],

        ]);

        Toastr::success('successfully added');
        return back();

    }


    public function removeFromcart($cart_id){

        \Cart::remove($cart_id);

        Toastr::info('delete item');
        return back();

    }

    public function couponApply(Request $request){

        // dd($request->all());

        if(!Auth::check()){
            Toastr::error('must be needed login');
            return redirect()->route('login.page');
        }

       $check = Coupon::where('coupon_name', $request->coupon_code)->first();

       if (Session::get('coupon')) {

        Toastr::error('Already applied this coupon!!!');
        return redirect()->back();

       }

       if ($check !=null) {

            $check_validity = $check->validity_till > Carbon::now()->format('Y-m-d');

            if ($check_validity) {

                Session::put('coupon',[

                    'coupon_name' => $check->coupon_name,
                    'discount_amount' => (\Cart::getSubTotal() * $check->discount_amount)/100,
                    'cart_total' => \Cart::getSubTotal(),
                    'balance' => \Cart::getSubTotal() - (\Cart::getSubTotal() * $check->discount_amount)/100

                ]);

                Toastr::success('successfully coupon code applied !!!');
                return redirect()->back();
            }

            else {
                Toastr::error('coupon code expire');
                return redirect()->back();
            }

        }

        else {
            Toastr::error('invalid coupon code');
            return redirect()->back();
        }


    }


    public function couponRemove($coupon_name){

        Session::forget('coupon');
        Toastr::success('successfully coupon remove');
        return redirect()->back();

    }
}
