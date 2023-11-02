<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $testimonial = Testimonial::where('is_active',1)->latest('id')->limit(3)->select(['id','client_name', 'client_designation', 'client_msg', 'client_img'])->get();

        // return $testimonial;
        // return view('frontend.pages.home', compact('testimonial'));

        $product = Product::where('is_active',1)->latest('id')->select('id', 'title', 'slug', 'price', 'product_stock', 'product_rating', 'product_img')->paginate(8);
        return view('frontend.pages.home', compact('testimonial', 'product'));


    }

    public function shopePage(){

        $allProduct = Product::where('is_active',1)->latest('id')->select('id', 'title', 'slug', 'price', 'product_stock', 'product_rating', 'product_img')->paginate(10);
        $categories = category::where('isActive',1)->with('product')->latest('id')->limit(5)->select(['id','title','slug'])->get();

        // dd($categories->all());
        return view('backend.layouts.inc.shoppage', compact('allProduct','categories'));

    }


    public function productDetails($product_slug){

        $product = Product::whereSlug($product_slug)->with('category')->first();
        $related_product = Product::whereNot('slug',$product_slug)->select('id','title','slug','price','product_img')->limit(4)->get();

        return view('frontend.pages.widgets.singleProduct',compact('product', 'related_product'));
    }
}
