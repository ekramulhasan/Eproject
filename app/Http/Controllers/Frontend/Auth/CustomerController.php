<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard(){

        $user_data = Auth::user();
        return view('frontend.pages.widgets.dashboard',compact('user_data'));
    }
}
