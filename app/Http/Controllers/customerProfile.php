<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class customerProfile extends Controller
{

    public function profile_edit(string $id){

        $customer_data = User::where('role_id',2)->find($id);
        return view('frontend.pages.widgets.profile_edit',compact('customer_data'));
    }

    public function update(Request $request, string $id){

        $customer_edit = User::where('role_id',2)->find($id);

        $customer_edit->update([

         'name' => $request->customer_name,
         'email' => $request->customer_email,
         'phone' => $request->customer_phone,
         'address' => $request->customer_address

        ]);

        Toastr::success('successfully user updated');
        return redirect()->route('dashboard.page');

       }



}
