@extends('backend.layouts.master')
@section('title')
Order Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">

<style>

  .dataTables_length{
    padding: 20px 0;
  }

</style>

@endpush

@section('content')

<div class="row">

    <h1>Order Table List</h1>

    <div class="col-12">

    </div>


    <div class="col-12">

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
                            <div class="modal fade" id="Modal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="Modal{{ $value->id }}">#Order ID: {{ $value->id }}</h5>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">cancle</button> --}}
                                    </div>
                                    <div class="modal-body">

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
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
                                                                    <td>{{ $item->product->name}}</td>
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
                                    
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>
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


@endsection


@push('admin_script')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}

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
