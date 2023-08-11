@extends('frontend.layouts.master')
@section('title')
Home
@endsection


@section('index_content')

@include('frontend.pages.widgets.search')
@include('frontend.pages.widgets.slider')
@include('frontend.pages.widgets.feature')
@include('frontend.pages.widgets.countDown')
@include('frontend.pages.widgets.productArea')
@include('frontend.pages.widgets.testamonial')

@include('frontend.pages.widgets.newLetter')


@endsection



