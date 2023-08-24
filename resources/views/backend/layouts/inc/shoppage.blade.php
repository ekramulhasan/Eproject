@extends('frontend.layouts.master')
@section('title') shop page @endsection

@section('index_content')
@include('backend.layouts.inc.breadCumb',['pageName'=>'Shop'])



<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <a class="active" data-toggle="tab" href="#all">All product</a>
                        </li>

                        @foreach ($categories as $value)

                        <li>
                            <a data-toggle="tab" href="#{{ $value->slug }}">{{ $value->title }}</a>
                        </li>

                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <ul class="row">

                    @foreach ($allProduct as $value)



                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img src="{{ asset('assets/uploads/products') }}/{{ $value->product_img }}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('productDetails.page',['product_slug'=>$value->slug]) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('productDetails.page',['product_slug' => $value->slug]) }}">{{ $value->title }}</a></h3>
                                <p class="pull-left">{{ $value->price }} $

                                </p>
                                <ul class="pull-right d-flex">

                                    @for ($i=0;$i<$value->product_rating;$i++)

                                        <li><i class="fa fa-star"></i></li>

                                    @endfor

                                </ul>
                            </div>
                        </div>
                    </li>

                    @endforeach

                    <div class="col-12 d-flex text-center justify-content-center">

                        {{ $allProduct->links() }}

                    </div>

                </ul>
            </div>

            @foreach ($categories as $category)

            <div class="tab-pane" id="{{ $category->slug }}">

                @foreach ($category->product as $products )


                <ul class="row">
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img src="{{ asset('assets/uploads/products') }}/{{ $products->product_img }}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('productDetails.page',['product_slug'=>$products->slug]) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="single-product.html">{{ $products->title }}</a></h3>
                                <p class="pull-left">{{ $products->price }} $

                                </p>
                                <ul class="pull-right d-flex">


                                    @for ($i=0;$i<$products->product_rating;$i++)

                                    <li><i class="fa fa-star"></i></li>

                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>


                @endforeach

            </div>

            @endforeach



        </div>
    </div>
</div>
<!-- product-area end -->





@endsection
