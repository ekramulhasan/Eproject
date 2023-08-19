   <!-- product-area start -->
   <div class="product-area">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="{{ asset('assets/frontend') }}/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
            @foreach ($product as $value)

            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <span>Sale</span>
                        <img src="{{ asset('assets/uploads/products') }}/{{ $value->product_img }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">{{ $value->title }}</a></h3>
                        <p class="pull-left">{{ $value->price }} $

                        </p>
                        <ul class="pull-right d-flex">

                            @for ($i=0; $i < $value->product_rating; $i++)

                                <li><i class="fa fa-star"></i></li>

                            @endfor

                            {{-- <li><i class="fa fa-star-half-o"></i></li> --}}
                        </ul>
                    </div>
                </div>
            </li>

            @endforeach


            {{-- <li class="col-12 text-center d">
                <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
            </li> --}}


            <div class="col-12 text-center d-flex justify-content-center ">

                <div class="py-3">

                    {{ $product->links() }}

                </div>

            </div>

        </ul>
    </div>
</div>
<!-- product-area end -->