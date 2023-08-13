<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $testimonial = Testimonial::where('is_active',1)->latest('id')->limit(3)->select(['id','client_name', 'client_designation', 'client_msg', 'client_img'])->get();

        // return $testimonial;
        return view('frontend.pages.home', compact('testimonial'));
    }
}
