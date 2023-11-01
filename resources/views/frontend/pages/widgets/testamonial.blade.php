
    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">
                    <div class="testmonial-active owl-carousel">
                        @foreach ( $testimonial as $value )


                        <div class="test-items test-items2">
                            <div class="test-content">
                                <p>{{ $value->client_msg }}</p>
                                <h2>{{ $value->client_name }}</h2>
                                <p>{{ $value->client_designation }}</p>
                            </div>
                            <div class="test-img2">
                                <img src="{{ asset('assets/uploads/testimonial') }}/{{ $value->client_img }}" alt="" class="rounded">
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->
