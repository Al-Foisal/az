@extends('admin.master')
@section('body')
    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/dropzone/dropzone.css" type="text/css" />

    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('/') }}assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Listjs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Listjs</li>
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
                        <h4 class="card-title mb-0">Add, Edit & Remove</h4>
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
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Joining Date</th>
                                        <th class="sort" data-sort="status">Delivery Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <td class="customer_name">Mary Cousar</td>
                                <td class="email">marycousar@velzon.com</td>
                                <td class="phone">580-464-4694</td>
                                <td class="date">06 Apr, 2021</td>
                                <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                    <div class="edit">
                                    <button class="btn btn-sm btn-success edit-item-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showModal1">Edit</button>
                                        <div class="modal fade" id="showModal1" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered"
                                            style="min-width: 75%">
                                                <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title"
                                                        id=""><a href="#"><img width=" 16%" style="margin-top: -10px" src="{{asset('/')}}assets/images/update-gif.gif" border="0" alt="animated-computer-image-0116" /></a> Update Record.</h5>
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        id="close-modal"></button>
                                                </div>
                                                <form>
                                                    <div class="modal-body">

                                                    

                                                        <div class="mb-3">
                                                            <label for="customername-field"
                                                                class="form-label">Customer
                                                                Name</label>
                                                            <input type="text"
                                                                id="customername-field"
                                                                class="form-control"
                                                                placeholder="Enter Name"
                                                                required />
                                                        </div>
                                                        
                                                        <div>
                                                            <label for="status-field"
                                                                class="form-label">Status</label>
                                                            <select class="form-control"
                                                                data-trigger
                                                                name="status-field"
                                                                id="status-field">
                                                                <option value="">Status
                                                                </option>
                                                                <option value="Active">Active
                                                                </option>
                                                                <option value="Block">Block
                                                                </option>
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
                                                                id="add-btn">Add
                                                                Customer</button>
                                                            <button type="button"
                                                                class="btn btn-success"
                                                                id="edit-btn">Update</button>
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
                                        data-bs-target="#deleteRecordModal">Remove</button>
                                    <div class="modal fade zoomIn" id="deleteRecordModal"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered"
                                            style="weidth:50%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        id="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mt-2 text-center">
                                                        <a href="#"><img
                                                                src="{{asset('/')}}assets/images/delete-gif.gif"
                                                                border="0"
                                                                alt="animated-bin-and-trash-can-image-0013" /></a>
                                                        <div
                                                            class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                            <h4>Are you Sure ?</h4>
                                                            <p class="text-muted mx-4 mb-0">Are
                                                                you Sure You want to Remove this
                                                                Record ?</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                        <button type="button"
                                                            class="btn w-sm btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button"
                                                            class="btn w-sm btn-danger "
                                                            id="delete-record">Yes, Delete
                                                            It!</button>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                     </div>
                                  </div>
                                </div>
                              </td>
                           </tbody>
                       </table>
                         
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
     

        <div class="modal fade" id="showModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"
                    style="min-width: 75%">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id=""><a href="#"><img width=" 13%" style="margin-top: -14px" src="{{asset('/')}}assets/images/add-gif.gif" border="0" alt="animated-computer-image-0116" /></a> Add New Record.</h5>

                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form>
                            <div class="modal-body">

                            

                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">Customer
                                        Name</label>
                                    <input type="text"
                                        id="customername-field"
                                        class="form-control"
                                        placeholder="Enter Name"
                                        required />
                                </div>
                                <div class="mb-3">
                                
                                    <!-- end row -->

                                    <div class="row mt-2">
                                        <div class="col-lg-12">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div
                                                        class="card">
                                                        <div
                                                            class="card-header">
                                                            <h4
                                                                class="card-title mb-0">
                                                                Multiple
                                                                File
                                                                Upload
                                                            </h4>
                                                        </div>
                                                        <!-- end card header -->

                                                        <div
                                                            class="card-body">

                                                            <input
                                                                type="file"
                                                                class="filepond filepond-input-multiple"
                                                                multiple
                                                                name="filepond"
                                                                data-allow-reorder="true"
                                                                data-max-file-size="3MB"
                                                                data-max-files="3">
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div> <!-- end col -->


                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email-field"
                                        class="form-label">Email</label>
                                    <input type="email"
                                        id="email-field"
                                        class="form-control"
                                        placeholder="Enter Email"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field"
                                        class="form-label">Phone</label>
                                    <input type="text"
                                        id="phone-field"
                                        class="form-control"
                                        placeholder="Enter Phone no."
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label for="date-field"
                                        class="form-label">Joining
                                        Date</label>
                                    <input type="text"
                                        id="date-field"
                                        class="form-control"
                                        placeholder="Select Date"
                                        required />
                                </div>

                                <div>
                                    <label for="status-field"
                                        class="form-label">Status</label>
                                    <select class="form-control"
                                        data-trigger
                                        name="status-field"
                                        id="status-field">
                                        <option value="">Status
                                        </option>
                                        <option value="Active">Active
                                        </option>
                                        <option value="Block">Block
                                        </option>
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
                                        id="add-btn">Add
                                        Customer</button>
                                    <button type="button"
                                        class="btn btn-success"
                                        id="edit-btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div></div>
            </div>
        </div>
    <!-- container-fluid -->
   </div>

</div>
    <!-- end main content-->
    <!-- end main content-->

    </div>
   
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } )
    </script>
   
@endsection
