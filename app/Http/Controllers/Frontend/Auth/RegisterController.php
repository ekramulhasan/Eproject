<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CusRegisterRequrest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPage(){

        return view('frontend.pages.widgets.registerPage');
    }


    public function loginPage(){

        return view('frontend.pages.widgets.loginPage');
    }

    public function userStore(CusRegisterRequrest $request){


        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)

        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credential)) {

            $request->session()->regenerate();
            return redirect()->route('dashboard.page');
        }

    }

    public function loginStore(Request $request){

        $request->validate([

            'email' => 'bail|required|email',
            'password' => 'bail|required|min:4|string'

        ]);


        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credential,$request->filled('remember'))) {

            $request->session()->regenerate();
            return redirect()->route('dashboard.page');
        }


        return back()->withErrors([
            'email' => 'wrong credential found!',
        ])->onlyInput('email');



    }

    public function logOut (Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page');

    }
}
