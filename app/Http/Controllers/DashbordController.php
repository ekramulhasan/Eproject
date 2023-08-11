<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function dashbord(){

        return view('backend.pages.dashbord');
    }
}
