@extends('frontend.layouts.master')
@section('title')
dashboard
@endsection


@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName'=>'Dashboard'])

<h1>user name: {{ $user_data->name }}</h1>
<h1>user email: {{ $user_data->email }}</h1>

@endsection
