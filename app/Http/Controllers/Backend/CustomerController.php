<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CustomerController extends Controller
{

    public function index(){

        $customers = User::where('role_id',2)->select('id','name','email','phone','created_at')->latest('id')->paginate(15);
        return view('backend.customer.customerData',compact('customers'));

    }

    public function edit( string $id){

      $customer_data = User::where('role_id',2)->find($id);
      return view('backend.customer.customer-edit',compact('customer_data'));

    }

    public function update(Request $request, string $id){

       $customer_edit = User::where('role_id',2)->find($id);

    //    dd($request->all());

       $customer_edit->update([

        'name' => $request->customer_name,
        'email' => $request->customer_email,
        'phone' => $request->customer_phone

       ]);

       Toastr::success('successfully user updated');
       return redirect()->route('customer.data');

      }


    public function delete(string $id){

        User::where('role_id',2)->find($id)->delete();
        Toastr::success('successfully user delete');
        return redirect()->route('customer.data');

      }


}
