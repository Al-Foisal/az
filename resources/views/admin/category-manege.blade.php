@extends('admin.master')
@section('body')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Category Manage</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Category Manage Tables</a>
                                    </li>
                                    <li class="breadcrumb-item active">Category Manage</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Category Add, Edit & Remove</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-success add-btn float-right"
                                                    data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                                                        class="ri-add-line align-bottom me-1"></i> Add</button>

                                            </div>
                                        </div>

                                    </div>
                                    <table id="table_id" class="display">
                                        <thead>
                                            <tr>
                                                <th class="sort text-center" data-sort="customer_name">Category Name</th>
                                                <th class="sort text-center" data-sort="status"> Status</th>
                                                <th class="sort text-center" data-sort="email">Create Date</th>
                                                <th class="sort " data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($category))
                                                @foreach ($category as $item)
                                                    <tr>
                                                        <td class="customer_name  text-center">{{ $item->category_name }}
                                                        </td>

                                                        <td class="phone text-center">{{ $item->status }}</td>
                                                        <td class="date text-center">{{ $item->created_at }}1</td>

                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit ">
                                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showModal1{{ $item->id }}">Edit</button>
                                                                    <div class="modal fade"
                                                                        id="showModal1{{ $item->id }}" tabindex="-1"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            style="min-width: 75%">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-light p-3">
                                                                                    <h5 class="modal-title" id="">
                                                                                        <a href="#"><img
                                                                                                width=" 16%"
                                                                                                style="margin-top: -10px"
                                                                                                src="{{ asset('/') }}assets/images/update-gif.gif"
                                                                                                border="0"
                                                                                                alt="animated-computer-image-0116" /></a>
                                                                                        Update Record.</h5>
                                                                                    </h5>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"
                                                                                        id="close-modal"></button>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('categorys.update', $item->id) }}"
                                                                                    method="post">
                                                                                    <div class="modal-body">
                                                                                        @csrf
                                                                                        @method('PUT')

                                                                                        <input type="hidden" name="id"
                                                                                            value="{{ $item->id }}">
                                                                                        <div class="mb-3">
                                                                                            <label for="customername-field"
                                                                                                class="form-label">Category
                                                                                                Name</label>
                                                                                            <input type="text"
                                                                                                id="customername-field"
                                                                                                class="form-control"
                                                                                                placeholder="Enter Name"
                                                                                                name="category_name"
                                                                                                value="{{ $item->category_name }}"
                                                                                                required />
                                                                                        </div>

                                                                                        <div>
                                                                                            <label for="status-field"
                                                                                                class="form-label">Status</label>
                                                                                            <select class="form-control"
                                                                                                data-trigger name="status"
                                                                                                id="status-field"
                                                                                                name="status">
                                                                                                <option
                                                                                                    value="{{ $item->status }}">
                                                                                                    {{ $item->status }}
                                                                                                </option>

                                                                                                <option value="Active">
                                                                                                    Active
                                                                                                </option>
                                                                                                <option value="Inactive">
                                                                                                    Inactive
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <div
                                                                                            class="hstack gap-2 justify-content-end">
                                                                                            <button type="button"
                                                                                                class="btn btn-light"
                                                                                                data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-success"
                                                                                                id="add-btn">Update</button>

                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="remove">
                                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal{{ $item->id }}">Remove</button>
                                                                    <div class="modal fade zoomIn"
                                                                        id="deleteRecordModal{{ $item->id }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                            style="weidth:50%">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"
                                                                                        id="btn-close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="mt-2 text-center">
                                                                                        <a href="#"><img
                                                                                                src="{{ asset('/') }}assets/images/delete-gif.gif"
                                                                                                border="0"
                                                                                                alt="animated-bin-and-trash-can-image-0013" /></a>
                                                                                        <div
                                                                                            class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                            <h4>Are you Sure ?</h4>
                                                                                            <p
                                                                                                class="text-muted mx-4 mb-0">
                                                                                                Are
                                                                                                you Sure You want to Remove
                                                                                                "{{ $item->category_name }}"
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <form
                                                                                        action="{{ route('categorys.destroy', $item->id) }}"
                                                                                        method="post">
                                                                                        @method('DELETE')
                                                                                        @csrf

                                                                                        <div>
                                                                                            <button type="button"
                                                                                                class="btn w-sm btn-light"
                                                                                                data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn w-sm btn-danger "
                                                                                                id="delete-record">Yes,
                                                                                                Delete
                                                                                                It!</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h5 class="text-center">No category found.</h5>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>


                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="min-width: 75%">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id=""><a href="#"><img width=" 13%"
                                            style="margin-top: -14px" src="{{ asset('/') }}assets/images/add-gif.gif"
                                            border="0" alt="animated-computer-image-0116" /></a> Add New Record.</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form action="{{ route('categorys.store') }}" method="post">
                                @csrf
                                <div class="modal-body">



                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Category
                                            Name</label>
                                        <input type="text" id="customername-field" class="form-control"
                                            placeholder="Enter Name" name="category_name" required />
                                    </div>

                                    <div>
                                        <label for="status-field" class="form-label">Status</label>
                                        <select class="form-control" data-trigger id="status-field" name="status">

                                            <option value="Active">Active
                                            </option>
                                            <option value="Inactive">Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add
                                            Category</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>

    </div>
    <!-- end main content-->
    <!-- end main content-->

    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        })
    </script>

@endsection
