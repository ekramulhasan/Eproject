@extends('frontend.layouts.master')
@section('title')
    dashboard
@endsection

@push('frontend_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

<style>

  .dataTables_length{
    padding: 20px 0;
  }

</style>

@endpush


@section('index_content')
    @include('backend.layouts.inc.breadCumb', ['pageName' => 'Dashboard'])


    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item font-weight-bold"><a
                                    href="{{ route('profile-edit', [$user_data->id]) }}">Profile edit</a></li>

                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659651_1280.png" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user_data->name }}</h5>
                            <p class="text-muted mb-1">Customer</p>
                            <p class="text-muted mb-4">{{ $user_data->address }}</p>
                            <div class="d-flex justify-content-center mb-3">
                                {{-- <button type="button" class="btn btn-primary m-1">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1 m-1">Message</button> --}}
                                <a href="{{ route('profile-edit', [$user_data->id]) }}" class="btn btn-primary">profile
                                    edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fa fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://example.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fa fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">example_github</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fa fa-twitter-square fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@example_twitter</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fa fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">example_instagram</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fa fa-facebook-square fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">example_facebook</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user_data->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user_data->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user_data->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            {{-- <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(098) 765-4321</p>
                </div>
              </div>
              <hr> --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user_data->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card ">
                                <div class="card-body">
                                    <h4>Order List</h4>
                                    <hr>

                                    <div class="table-responsive my-2">

                                        <table class="table table-bordered table-striped" id="my_table">

                                            <thead>
                                              <tr>

                                                <th scope="col">ID</th>
                                                <th scope="col">View Details</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Sub-Total</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Total</th>

                                              </tr>
                                            </thead>

                                            <tbody>


                                            @forelse ($order as $value)

                                                <tr>

                                                    <td scope="row">{{ $order->firstItem()+$loop->index }}</td>

                                                    <td>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $value->id }}">
                                                           Order details
                                                        </button>


                                                        <!-- Modal -->
                                                        <div class="modal fade " id="Modal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="Modal{{ $value->id }}">#Order ID: {{ $value->id }}</h5>
                                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="container-fluid">
                                                                        <div class="row m-auto">
                                                                            <div class="col-12 m-2">
                                                                                <table class="table table-striped table-inverse table-responsive">
                                                                                    <thead class="thead-inverse">
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Product Name</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Unit Price</th>
                                                                                            <th>Sub total</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($value->orderDetails as $item)
                                                                                            <tr>
                                                                                                <td>{{ $loop->index+1 }}</td>
                                                                                                <td>{{ $item->product->name ?? 'none'}}</td>
                                                                                                <td>{{ $item->product_qty }}</td>
                                                                                                <td>{{ $item->product_price }}</td>
                                                                                                <td>{{ $item->product_price*$item->product_qty }}</td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                            <tr class="mb-5">
                                                                                                <td colspan="4">
                                                                                                    Total Payable Amount:
                                                                                                </td>
                                                                                                <td><strong class="fw-bold text-danger"> ৳{{ $value->total }}</strong></td>
                                                                                            </tr>
                                                                                            <tr class="mt-5">
                                                                                                <td colspan="50">
                                                                                                    <p class="text-primary">Billing Address:</p>
                                                                                                    <p>Recipent Name: {{ $value->billing->name }}</p>
                                                                                                    <p>Mobile Number: {{ $value->billing->mobile}}</p>
                                                                                                    <p>Address: {{ $value->billing->address }}</p>
                                                                                                    <p>Upazila: {{ $value->billing->upazila->name }} ,
                                                                                                    Distrcit: {{ $value->billing->district->name }}</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                </div>

                                                                {{-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div> --}}

                                                            </div>
                                                            </div>
                                                        </div>


                                                    </td>

                                                    <td>{{ $value->created_at->format('d-M-Y H:i:s') }}</td>
                                                    <td>{{ $value->sub_total }}</td>
                                                    <td>{{ $value->discount_amount }}({{ $value->coupon_name }})</td>
                                                    <td>{{ $value->total }}</td>



                                                  </tr>


                                                @empty
                                                    <tr>
                                                        <td colspan="50">
                                                            <p class="text-center">No order Found !!!</p>
                                                        </td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                          </table>

                                          {{ $order->links() }}

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('frontend_script')

{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>

    $(document).ready( function () {

    $('#my_table').DataTable({
        // pagingType: 'first_last_numbers'
    });

    $('.delete-corfirm').click(function(event){

        let form = $(this).closest('form')

        event.preventDefault();

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})


    })

} );

</script>

@endpush


