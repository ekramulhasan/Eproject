<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Brian2694\Toastr\Facades\Toastr;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $coupon =  Coupon::latest('id')->select(['id','coupon_name', 'discount_amount', 'minimum_purchase_amount', 'validity_till','created_at'])->paginate(500);

      return view('backend.coupon.index', compact('coupon'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.coupon.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)

    {
        Coupon::create([

            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount,
            'minimum_purchase_amount' => $request->mini_pur,
            'validity_till' => $request->ex_date,

        ]);

        Toastr::success('successfully added coupon');
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon_edit = Coupon::find($id);
        return view('backend.coupon.edit',compact('coupon_edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $coupon_update = Coupon::find($id);
       $coupon_update->update([

            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount,
            'minimum_purchase_amount' => $request->mini_pur,
            'validity_till' => $request->ex_date,

       ]);

       Toastr::success('successfully coupon updated');
       return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::find($id)->delete();
        Toastr::success('successfully coupon deleted');
        return redirect()->route('coupon.index');
    }
}
