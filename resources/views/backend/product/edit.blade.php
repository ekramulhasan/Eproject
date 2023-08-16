@extends('backend.layouts.master')
@section('title')
    Create testimonial
@endsection

@push('admin_style')
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush

@section('content')
    <div class="row">

        <h1>Product edit</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Product List
                </a>
            </div>
        </div>
    </div>


    <div class="card mt-3">

        <div class="card-body">

            <form action="{{ route('products.update', $product_update->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- category selection and product name --}}
                <div class="col-12 mt-3">

                    <div class="mb-3">

                        <label for="category_id" class="form-label">Category Select</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            {{-- <option selected disabled>Open this select menu</option> --}}

                            @foreach ($categories as $value)
                                {{-- <option value="{{ $value->id }}">{{ $value->title }}</option> --}}

                                    <option value="{{ $value->id }}" @if ($value->id == $product_update->category_id)
                                        selected
                                    @endif>
                                        {{ $value->title }}
                                    </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text"
                            class="form-control @error('product_name')
                                        is-invalid
                                    @enderror"
                            id="product_name" placeholder="enter product name" name="product_name" value="{{ $product_update->title }}">

                        @error('product_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                </div>

                {{-- category selection and product name end --}}


                {{-- product price and code --}}

                <div class="row">


                    <div class="col-6 mb-3">


                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number"
                            class="form-control @error('product_price')
                                is-invalid
                            @enderror"
                            id="product_price" placeholder="enter product price" name="product_price" min="0" value="{{ $product_update->price }}">

                        @error('product_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>


                    <div class="col-6 mb-3">


                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="number"
                            class="form-control @error('product_Code')
                                is-invalid
                            @enderror"
                            id="product_code" placeholder="enter product code" name="product_code" min="0" value="{{ $product_update->product_id }}">

                        @error('product_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                </div>

                {{-- product price and code end --}}


                {{-- stock quantity and alert quantity --}}

                <div class="row">

                    <div class="col-6 mb-3">


                        <label for="stock_quantiry" class="form-label">Stock Quantity</label>
                        <input type="number"
                            class="form-control @error('stock_quantiry')
                                is-invalid
                            @enderror"
                            id="stock_quantiry" placeholder="enter stock quantity" name="stock_quantiry" min="0" value="{{ $product_update->product_stock }}">

                        @error('stock_quantiry')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>

                    <div class="col-6 mb-3">


                        <label for="alert_quantity" class="form-label">Alert Quantity</label>
                        <input type="number"
                            class="form-control @error('alert_quantity')
                                is-invalid
                            @enderror"
                            id="alert_quantity" placeholder="enter product code" name="alert_quantity" min="1" value="{{ $product_update->alert_quantiry }}">

                        @error('product_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>

                </div>

                {{-- stock quantity and alert quantity end --}}


                {{-- product description and image --}}

                    <div class="row">

                       <div class="col-12">


                        <div class="mb-3">

                            <div class="form-floating">

                                <textarea class="form-control @error('client_msg')
                                is-invalid
                                @enderror" placeholder="Short Description" id="short_description" style="height: 150px" name="short_description" >{{ $product_update->short_description }}</textarea>
                                <label for="short_description"> Short Description</label>

                                @error('short_description')

                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                                @enderror
                            </div>

                          </div>


                          <div class="mb-3">

                            <div class="form-floating">

                                <textarea class="form-control @error('long_description')
                                is-invalid
                                @enderror" placeholder="Long Description" id="short_description" style="height: 150px" name="long_description">{{ $product_update->long_description }}</textarea>
                                <label for="long_description"> Long Description</label>

                                @error('long_description')

                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                                @enderror
                            </div>

                          </div>


                          <div class="mb-3">

                            <div class="form-floating">

                                <textarea class="form-control @error('long_description')
                                is-invalid
                                @enderror" placeholder="Additional info" id="short_description" style="height: 150px" name="additional_info">{{ $product_update->additional_info }}</textarea>
                                <label for="long_description"> Additional Info</label>

                                @error('additional_info')

                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                                @enderror
                            </div>

                          </div>



                          <div class="mb-3">

                            <label for="product_img" class="form-label">Product Image</label>
                            <input type="file" class="form-control dropify" id="" name="product_img" data-default-file="{{ asset('assets/uploads/products') }}/{{ $product_update->product_img }}">

                            @error('product_img')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>

                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="category_check" role="switch" name="is_active" checked>
                            <label class="form-check-label" for="category_check">Active/Inactive</label>
                        </div>



                        <button type="submit" class="btn btn-primary mt-2">Update</button>

                       </div>


                    </div>


                {{-- product description and image --}}

            </form>

         </div>
    </div>




@endsection


@push('admin_script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>
@endpush
