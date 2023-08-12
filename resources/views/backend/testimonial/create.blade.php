@extends('backend.layouts.master')
@section('title') Create testimonial @endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('content')


    <div class="row">

        <h1>Testimonial create</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('testimonial.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to testimonial

                </a>
            </div>
        </div>

        <div class="col-12 mt-3">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">

                            <label for="client_name" class="form-label">Client Name</label>
                            <input type="text" class="form-control @error('client_name')
                                is-invalid
                            @enderror" id="client_name" placeholder="enter client name" name="client_name">

                            @error('client_name')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>


                          <div class="mb-3">

                            <label for="client_designation" class="form-label">Client Designation</label>
                            <input type="text" class="form-control @error('client_designation')
                                is-invalid
                            @enderror" id="client_designation" placeholder="enter client designation" name="client_designation">

                            @error('client_designation')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>


                          <div class="mb-3">

                            <div class="form-floating">
                                <textarea class="form-control @error('client_msg')
                                is-invalid
                                @enderror" placeholder="Client Message" id="floatingTextarea2" style="height: 150px" name="client_msg"></textarea>
                                <label for="floatingTextarea2"> Client Message</label>

                                @error('client_msg')

                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                                @enderror
                            </div>


                          </div>


                          <div class="mb-3">

                            <label for="client_img" class="form-label">Client Image</label>
                            <input type="file" class="form-control dropify" id="" name="client_img">

                            @error('client_img')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="category_check" role="switch" name="is_active" checked>
                            <label class="form-check-label" for="category_check">Active/Inactive</label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Add</button>

                    </form>

                </div>

            </div>

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
