@extends('frontend.layouts.master')
@section('title')profile edit @endsection

@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName' => 'profile edit'])

<div class="row p-3" style="background-color: #eee;">
    <div class="col-10 m-auto">

        <div class="card my-3" style="border-radius: 15px">

            <div class="card-body">

                <form action="{{ route('profile-update',[$customer_data->id]) }}" method="post">
                    @csrf
                    @method('PUT')


                    <div class="col-12 mt-3">


                        <div class="mb-3">

                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text"
                                class="form-control @error('customer_name')
                                            is-invalid
                                        @enderror"
                                id="customer_name" placeholder="enter customer name" name="customer_name" value="{{ $customer_data->name }}" style="border-radius: 10px">

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
                                id="customer_email" placeholder="enter customer email" name="customer_email" value="{{ $customer_data->email }}" style="border-radius: 10px">

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
                                id="customer_phone" placeholder="enter customer phone" name="customer_phone" value="{{ $customer_data->phone }}" style="border-radius: 10px">

                            @error('customer_phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="customer_address" class="form-label">Customer Address</label>
                            <input type="text"
                                class="form-control @error('customer_address')
                                            is-invalid
                                        @enderror"
                                id="customer_address" placeholder="enter customer address" name="customer_address" value="{{ $customer_data->address }}" style="border-radius: 10px">

                            @error('customer_address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-primary mt-2" style="border-radius: 5px">Update</button>

                       </div>

                    </div>



                </form>



            </div>
        </div>

    </div>
</div>




@endsection
