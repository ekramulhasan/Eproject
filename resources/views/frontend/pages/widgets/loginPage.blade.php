@extends('frontend.layouts.master')
@section('title')
login page
@endsection


@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName'=>'Login'])

{{-- login page start here --}}

<div class="account-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="account-form form-style">

                    <form action="{{ route('login.store') }}" method="post">
                        @csrf

                        <p>Email Address *</p>
                        <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                        @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <p>Password *</p>
                        <input type="Password" name="password" class="form-control @error('password')
                        is-invalid
                    @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                        {{-- <div class="row">
                            <div class="col-lg-6">
                                <input id="password" type="checkbox">
                                <label for="password">Save Password</label>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="#">Forget Your Password?</a>
                            </div>
                        </div> --}}
                        <button type="submit">SIGN IN</button>


                    </form>

                    <div class="text-center">
                        <a href="{{ route('register.page') }}">Or Creat an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- login page end here --}}

@endsection
