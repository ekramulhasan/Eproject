@extends('backend.layouts.master')
@section('title')
    Edit Coupon
@endsection

@push('admin_style')
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('content')
    <div class="row">

        <h1>Coupon Edit</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('coupon.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Coupon List
                </a>
            </div>
        </div>
    </div>


    <div class="card mt-3">

        <div class="card-body">

            <form action="{{ route('coupon.update', [$coupon_edit->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="col-12 mt-3">


                    <div class="mb-3">

                        <label for="coupon_name" class="form-label">Coupon Name</label>
                        <input type="text"
                            class="form-control @error('coupon_name')
                                        is-invalid
                                    @enderror"
                            id="coupon_name" placeholder="enter coupon name" name="coupon_name" value="{{ $coupon_edit->coupon_name }}">

                        @error('coupon_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="discount" class="form-label">Discount Percentage</label>
                        <input type="number"
                            class="form-control @error('discount')
                                        is-invalid
                                    @enderror"
                            id="coupon_name" placeholder="enter discount percentage" name="discount" min="0" value="{{ $coupon_edit->discount_amount }}">

                        @error('discount')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="mini_pur" class="form-label">Minimum Purchase</label>
                        <input type="number"
                            class="form-control @error('mini_pur')
                                        is-invalid
                                    @enderror"
                            id="mini_pur" placeholder="enter minimum purchase" name="mini_pur" min="0" value="{{ $coupon_edit->minimum_purchase_amount }}">

                        @error('mini_pur')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="ex_date" class="form-label">Expire Date</label>
                        <input type="date"
                            class="form-control @error('ex_date')
                                        is-invalid
                                    @enderror"
                            id="mini_pur" placeholder="enter minimum purchase" name="ex_date" min="0" value="{{ $coupon_edit->validity_till }}">

                        @error('ex_date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="category_check" role="switch" name="is_active">
                        <label class="form-check-label" for="category_check">Active/Inactive</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Update Coupon</button>

                   </div>

                </div>



            </form>



        </div>
    </div>


@endsection

