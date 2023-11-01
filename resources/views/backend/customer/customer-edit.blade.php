@extends('backend.layouts.master')
@section('title')
    Edit customer
@endsection

@push('admin_style')
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('content')
    <div class="row">

        <h1>Customer Edit</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('customer.data') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Customer List
                </a>
            </div>
        </div>
    </div>


    <div class="card mt-3">

        <div class="card-body">

            <form action="{{ route('customer.update', [$customer_data->id]) }}" method="post">
                @csrf
                @method('POST')


                <div class="col-12 mt-3">


                    <div class="mb-3">

                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text"
                            class="form-control @error('customer_name')
                                        is-invalid
                                    @enderror"
                            id="customer_name" placeholder="enter customer name" name="customer_name" value="{{ $customer_data->name }}">

                        @error('customer_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="customer_email" class="form-label">Customer Email</label>
                        <input type="text"
                            class="form-control @error('customer_email')
                                        is-invalid
                                    @enderror"
                            id="customer_email" placeholder="enter customer email" name="customer_email" value="{{ $customer_data->email }}">

                        @error('customer_email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="customer_phone" class="form-label">Customer Phone</label>
                        <input type="text"
                            class="form-control @error('customer_phone')
                                        is-invalid
                                    @enderror"
                            id="customer_phone" placeholder="enter customer phone" name="customer_phone" value="{{ $customer_data->phone }}">

                        @error('customer_phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <button type="submit" class="btn btn-primary mt-2">Update customer</button>

                   </div>

                </div>



            </form>



        </div>
    </div>


@endsection

