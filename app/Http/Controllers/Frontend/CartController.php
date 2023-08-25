<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;


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
}
