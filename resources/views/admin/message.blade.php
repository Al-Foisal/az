@extends('admin.master')
@section('body')


        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0"><a href="#"><img style=" width: 10%;" src="{{asset('/')}}assets/images/123.gif" border="0" alt="gift" /></a>Website Setting Form</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">All Message .</a></li>
                                      
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                    @if($message1 = Session::get('message1'))
                                        <div class="alert alert-warning text-center alert-dismissible " id="panel" style="  background-color: #0d1428; color:rgb(255, 255, 255); ">
                                       
                                          {{ $message1}}
                                        </div>
                                        @endif
                    <table class="table">
                    <thead>
                        <tr>
                    
                        <th scope="col">Name</th>
                    
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                        
                        <td >@if(!empty($message_id->fname)){{$message_id->fname}}@endif @if(!empty($message_id->lname)){{$message_id->lname}}@endif</td>
                       
                        <td>@if(!empty($message_id->phone)){{$message_id->phone}}@endif</td>
                        <td>@if(!empty($message_id->email)){{$message_id->email}}@endif</td>
                        <td>
                       
                        
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
                    <form action="{{route('delete-message')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" @if(!empty($message_id->id)) value="{{$message_id->id}}"@endif>
                   <button type="submit"
                    class="btn w-sm btn-danger "
                    id="delete-record">Yes, Delete
                    It!</button>
                    </form>
            </div>
        </div>
    </div>
</div></td>
                        </tr>
                        <tr><td>@if(!empty($message_id->message)){{$message_id->message}}@endif</td></tr>
                    </tbody>
                    </table> 
                 </div>
                      
                     
            @endsection