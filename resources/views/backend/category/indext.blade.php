@extends('backend.layouts.master')
@section('title')
Category Index
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

    <h1>Category Table List</h1>

    <div class="col-12">

        <div class="d-flex justify-content-end">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>

                Add New Category
            </a>

        </div>

    </div>


    <div class="col-12">

        <div class="table-responsive my-2">

            <table class="table table-bordered table-striped" id="my_table">

                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Category slug</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($category as $value)

                    <tr>
                        <td scope="row">{{ $category->firstItem()+$loop->index }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>{{ $value->created_at->format('d M Y') }}</td>
                        <td>

                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                  Setting
                                </button>
                                <ul class="dropdown-menu">

                                  <li><a class="dropdown-item" href="{{ route('category.edit', $value->slug) }}"> <i class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                  <li>

                                    <form action="{{ route('category.destroy', $value->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="dropdown-item delete-corfirm"><i class="fa-regular fa-trash-can"></i> Delete</button>

                                    </form>
                                    {{-- <a class="dropdown-item" href="{{ route('category.destroy', $value->slug) }}"> </a> --}}
                                </li>

                                </ul>
                              </div>

                        </td>
                      </tr>

                    @endforeach



                </tbody>
              </table>

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
