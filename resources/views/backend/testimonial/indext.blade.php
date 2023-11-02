@extends('backend.layouts.master')
@section('title')
    testimonial Index
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">

    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush

@section('content')
    <div class="row">

        <h1>testimonial Table List</h1>

        <div class="col-12">

            <div class="d-flex justify-content-end">
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>

                    Add New testimonial
                </a>

            </div>

        </div>


        <div class="col-12">

            <div class="table-responsive my-2">

                <table class="table table-bordered table-striped" id="my_table">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Client Designation</th>
                            <th scope="col">Client Img</th>
                            <th scope="col">Last Modify</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($testimonial_data as $value)
                            <tr>
                                <td scope="row">{{ $testimonial_data->firstItem() + $loop->index }}</td>
                                <td>{{ $value->client_name }}</td>
                                <td>{{ $value->client_designation }}</td>
                                <td>

                                    <img src="{{ asset('assets/uploads/testimonial') }}/{{ $value->client_img }}"
                                        alt="" class="img-fluid rounded-circle h-20 w-20">

                                </td>
                                <td>{{ $value->updated_at->format('d M Y') }}</td>
                                <td>

                                    <div class="dropdown">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Setting
                                        </button>
                                        <ul class="dropdown-menu">

                                            <li><a class="dropdown-item"
                                                    href="{{ route('testimonial.edit', $value->id) }}"> <i
                                                        class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                            <li>

                                                <form action="{{ route('testimonial.destroy', $value->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item delete-corfirm"><i
                                                            class="fa-regular fa-trash-can"></i> Delete</button>

                                                </form>
                                                {{-- <a class="dropdown-item" href="{{ route('testimonial.destroy', $value->slug) }}"> </a> --}}
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
        $(document).ready(function() {

            $('#my_table').DataTable({
                // pagingType: 'first_last_numbers'
            });

            $('.delete-corfirm').click(function(event) {

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

        });
    </script>
@endpush
