<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage(){

        return view('backend.pages.loginPage');
    }

    public function loginUser(Request $request){

        // dd($request->all());

        $request->validate([

            'email' => 'bail|required|string|max:255',
            'password' => 'bail|required|string|min:4'

        ]);

        $cridentials = [

            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($cridentials)) {

            $request->session()->regenerate();
            return redirect()->intended('admin/dashbord');
        }


        return redirect()->withErrors([

            'email' => 'your mail is invalid'
        ])->onlyInput('email');


    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.loginpage');

    }
}
