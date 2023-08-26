@extends('frontend.layouts.master')
@section('title')
registe page
@endsection


@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName' => 'Register'])


{{-- register page start here --}}

<div class="account-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="account-form form-style">

                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        <p>User Name</p>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror


                        <p>User Phone</p>
                        <input type="tel" name="phone" id="" class="form-control @error('phone')
                        is-invalid
                    @enderror">
                    @error('phone')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror

                        <p>User Email</p>
                        <input type="email" name="email" id="" class="form-control @error('email')
                        is-invalid
                    @enderror">
                    @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror


                        <p>Password *</p>
                        <input type="Password" name="password" class="form-control @error('password')
                        is-invalid
                    @enderror">
                    @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror


                        <p>Confirm Password *</p>
                        <input type="Password" name="password_confirmation" class="form-control">
                        <button type="submit">Register</button>


                    </form>


                    <div class="text-center">
                        <a href="{{ route('login.page') }}">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- register page end here --}}

@endsection
