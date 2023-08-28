@extends('frontend.layouts.master')
@section('title')
checkout page
@endsection

@push('frontend_style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName' => 'checkout'])


<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input type="text">
                            </div>
                            <div class="col-12">
                                <p>Compani Name</p>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text">
                            </div>
                            <div class="col-12">
                                <p>Country *</p>
                                <input type="text">
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP</p>
                                <input type="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <input type="text">
                            </div>
                            <div class="col-12">
                                <input id="toggle1" type="checkbox">
                                <label for="toggle1">Pure CSS Accordion</label>
                                <div class="create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <span>Account password</span>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <input id="toggle2" type="checkbox">
                                <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                <div class="row" id="open2">
                                    <div class="col-12">
                                        <p>Country</p>
                                        <select id="s_country">
                                            <option value="1">Select a country</option>
                                            <option value="2">bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div> --}}
                                    <div class=" col-12">
                                        <p>Full Name*</p>
                                        <input id="s_f_name" type="text" name="name" class="form-control @error('name')
                                            is-invalid
                                        @enderror">

                                        @error('name')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class=" col-12">
                                        <p>Email Address*</p>
                                        <input id="s_l_name" type="email" name="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror">

                                    @error('email')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>


                                    <div class="col-12">
                                        <p>Phone Number*</p>
                                        <input id="s_c_name" type="tel" name="phone" class="form-control @error('email')
                                        is-invalid
                                    @enderror">
                                    @error('phone')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror

                                    </div>



                                        <div class="col-sm-6 col-12">
                                            <p>District*</p>
                                            <select id="district_id" class="form-select js-example-basic-single @error('district_id')
                                            is-invalid
                                        @enderror" name="district_id" >
                                                <option selected disabled>Select a district</option>

                                                @foreach ($district as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <p>Town/Upazila*</p>
                                            <select id="upazila_id" name="upazila_id" class="form-select js-example-basic-single @error('upazila_id')
                                            is-invalid
                                        @enderror">
                                                <option value="">Select a upazila</option>
                                            </select>
                                        </div>

                                    <div class="col-12 mt-3">
                                        <p>Your Address*</p>
                                        <input type="text" placeholder="Street address" name="address" class="form-control @error('address')
                                        is-invalid
                                    @enderror">

                                    @error('address')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    </div>
                                    {{-- <div class="col-12">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                    <div class="col-12">
                                        <p>Town / City </p>
                                        <input id="s_city" type="text" placeholder="Town / City">
                                    </div>
                                    <div class="col-12">
                                        <p>State / County </p>
                                        <input id="s_county" type="text">
                                    </div>
                                    <div class="col-12">
                                        <p>Postcode / Zip </p>
                                        <input id="s_zip" type="text" placeholder="Postcode / Zip">
                                    </div>
                                    <div class="col-12">
                                        <p>Email Address </p>
                                        <input id="s_email" type="email">
                                    </div>
                                    <div class="col-12">
                                        <p>Phone </p>
                                        <input id="s_phone" type="text" placeholder="Phone Number">
                                    </div> --}}
                                {{-- </div>
                            </div> --}}
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery" name="note" class="form-control"></textarea>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @foreach ( $carts as $value )
                            <li>{{ $value->name }} X {{ $value->quantity  }} <span class="pull-right">${{ $value->price*$value->quantity }}</span></li>
                        @endforeach
                        {{-- <li>Your Product Name <span class="pull-right">$100.00</span></li>
                        <li>Pure Nature Honey <span class="pull-right">$141.00</span></li>
                        <li>Subtotal <span class="pull-right"><strong>$380.00</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li> --}}

                        @if (Session::has('coupon'))

                        <li>Discount<span class="pull-right">(-) ${{ Session::get('coupon')['discount_amount'] }} </span></li>
                        <li>Total<span class="pull-right">${{ Session::get('coupon')['balance'] }} <del class="text-danger">${{ Session::get('coupon')['cart_total'] }}</del></span></li>

                        @else
                        <li>Subtotal<span class="pull-right">${{ $total_price }} <del></del></span></li>
                        <li>Total<span class="pull-right">${{ $total_price }} <del></del></span></li>
                        @endif

                    </ul>
                    <ul class="payment-method">
                        {{-- <li>
                            <input id="bank" type="checkbox">
                            <label for="bank">Direct Bank Transfer</label>
                        </li>
                        <li>
                            <input id="paypal" type="checkbox">
                            <label for="paypal">Paypal</label>
                        </li>
                        <li>
                            <input id="card" type="checkbox">
                            <label for="card">Credit Card</label>
                        </li> --}}
                        <li>
                            <input id="delivery" type="checkbox">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                    </ul>
                    <button type="submit">Place Order</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection

@push('frontend_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function() {

    $('.js-example-basic-single').select2();

    $('#district_id').on('change', function(){

        var district_id = $(this).val();

        if (district_id) {

            $.ajax({

                url: "{{ url('/upazila/ajax') }}/" +district_id,
                type:"GET",
                dataType: "json",
                success: function(data){

                    console.log(data);
                   var d = $('#upazila_id').empty();

                   $.each(data, function(key, value) {

                        $('#upazila_id').append('<option value="'+value.id+'">'+value.name+'</option>')

                   })
                }
            })

        }

    })

    });

</script>
@endpush
