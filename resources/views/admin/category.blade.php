@extends('admin.master')
@section('body')
@php
use App\Models\HomeSubimage;
@endphp
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Home/design image add</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Home/design image add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
        @if($message1 = Session::get('message'))
                                        <div class="alert alert-warning text-center alert-dismissible " id="panel" style="  background-color: #0d1428; color:rgb(255, 255, 255); ">
                                       
                                          {{ $message1}}
                                        </div>
                                        @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Home/design image Add, Edit & Remove</h4>
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
                                        <th class="sort" data-sort="customer_name">Title</th>
                                        <th class="sort" data-sort="email">Client</th>
                                        <th class="sort" data-sort="phone">Home Image</th>
                                        <th class="sort" data-sort="phone">Status</th>
                                        <th class="sort" data-sort="date">Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                              <tr>
                                @php
                                $home_image=0;
                               @endphp 
                               @foreach($home_image as $item)
                                <td class="customer_name">{{substr($item->title, 0, 40 )}} ..</td>
                                <td class="email">{{substr($item->client, 0, 40 )}} ..</td>
                                <td class="email"> <img src="{{asset($item->home_image)}}" width="100px" alt=""></td>
                             
                                <td class="status"><span class="badge badge-soft-success text-uppercase">{{$item->status}}</span></td>
                                <td style="    width: 122px;">
                                    <div class="d-inline gap-2">
                                    <div class="edit">
                                    <button class="btn btn-sm btn-success edit-item-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showModal1{{$item->id}}">Edit</button>
                                        <div class="modal fade" id="showModal1{{$item->id}}" tabindex="-1"
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
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                             
                                                             @csrf
                                                            <div class="modal-body">
                                                              <input type="hidden" value="{{$item->id}}" name="id">
                                                             <div class="mb-3">
                                                                    <label for="customername-field"
                                                                        class="form-label">
                                                                            Title
                                                                        </label>
                                                                    <input type="text"
                                                                        id="customername-field"
                                                                        name="title"
                                                                        class="form-control"
                                                                        value="{{$item->title}}"
                                                                        placeholder="Enter title"
                                                                        required />
                                                                </div>
                                
                                                                <div class="mb-3">
                                                                    <label for="customername-field"
                                                                        class="form-label">
                                                                            Client
                                                                        </label>
                                                                    <input type="text"
                                                                        id="customername-field"
                                                                        class="form-control"
                                                                        value="{{$item->client}}"
                                                                        name="client"
                                                                        placeholder="Enter containt"
                                                                        required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="customername-field"
                                                                        class="form-label">
                                                                            Brief
                                                                        </label>
                                                                    <input type="text"
                                                                        id="customername-field"
                                                                        name="brief"
                                                                        value="{{$item->brief}}"
                                                                        class="form-control"
                                                                        placeholder="Enter containt"
                                                                        required />
                                                                </div>
                                            
                                                                <div class="mb-3">
                                                                    <label for="emailidInput" class="form-label"> Thumbnail Image(Try to upload same height and width (371px to 371px))</label>
                                                                    <input type="file" name="home_image"  class="form-control img1">
                                                                    <div><img id="image2" width="100px" height="100px" src="{{ asset($item->home_image)}}"  alt=""></div>
                                                                </div>
                                                        
                                                                <div class="mb-3">
                                                                    <label for="emailidInput" class="form-label">Sub Image (choose one or more)</label>
                                                                    <input type="file" name="home_sub[]" multiple class="form-control img2">
                                                                       @php
                                                                        $sub = 0;
                                                                       @endphp
                                                                       @foreach($sub as $img)
                                                                       <div><img id="image2" width="100px" height="100px" src="{{ asset($img->home_sub)}}"  alt=""></div>
                                                                       @endforeach
                                                               
                                                                    </div>
                                                             
                                                                                                    <div class="mb-3">
                                                                <div>
                                                                    <label for="status-field"
                                                                        class="form-label">Category/Menu</label>
                                                                    <select class="form-control"
                                                                        data-trigger
                                                                        name="category_id"
                                                                        id="status-field">
                                                                        <option @if($item->category_id == '1') value="1}">IIlustration & Concept Art
                                                                           
                                                                            @elseif($item->category_id == '2')
                                                                            value="2">Logo & Branding
                                                                            @elseif($item->category_id == '3')
                                                                            value="3">Social Media Design
                                                                            @elseif($item->category_id == '4')
                                                                            value="4">Product Packagin
                                                                            @elseif($item->category_id == '5')
                                                                            value="5">UI/UX Design
                                                                            @elseif($item->category_id == '6')
                                                                            value="6">Poster & Typography
                                                                            @elseif($item->category_id == '7')
                                                                            value="7">Animation & 3D
                                                                            @elseif($item->category_id == '8')
                                                                            value="8">Apparel Design
                                                                            @elseif($item->category_id == '9')
                                                                            value="9">Publishing
                                                                            @elseif($item->category_id == '10')
                                                                            value="10">Other
                                                                            @endif
                                                                        </option>
                                                                        <option value="1">IIlustration & Concept Art
                                                                        </option>
                                                                        <option value="2">Logo & Branding
                                                                        </option>
                                                                        <option value="3">Social Media Design
                                                                        </option>
                                                                        <option value="4">Product Packagin
                                                                        </option>
                                                                        <option value="5">UI/UX Design
                                                                        </option>
                                                                        <option value="6">Poster & Typography
                                                                        </option>
                                                                        <option value="7">Animation & 3D
                                                                        </option>
                                                                        <option value="8">Apparel Design
                                                                        </option>
                                                                    
                                                                        <option value="9">Publishing
                                                                        </option>
                                                                        <option value="10">Other
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                </div>
                                                             <div class="mb-3">
                                                                
                                
                                                                <div>
                                                                    <label for="status-field"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-control"
                                                                        data-trigger
                                                                        name="status"
                                                                        id="status-field">
                                                                      
                                                                     
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
                                                                        id="add-btn">Update
                                                                        Image</button>
                                                                  
                                                                </div>
                                                            </div>
                                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="remove d-inline">
                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteRecordModal{{$item->id}}">Remove</button>
                                    <div class="modal fade zoomIn" id="deleteRecordModal{{$item->id}}"
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
                                                            <a href="">
                                                        <button type="button"
                                                            class="btn w-sm btn-danger "
                                                            id="delete-record">Yes, Delete
                                                            It!</button>
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                     </div>
                                  </div>
                                </div>
                              </td>
                               </tr>
                              @endforeach
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
                        <form action="" method="POST" enctype="multipart/form-data">
                                                             
                             @csrf
                            <div class="modal-body">

                             <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Title
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        name="title"
                                        class="form-control"
                                        placeholder="Enter title"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Client
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        class="form-control"
                                        name="client"
                                        placeholder="Enter containt"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Brief
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        name="brief"
                                        class="form-control"
                                        placeholder="Enter containt"
                                        required />
                                </div>
            
                                <div class="mb-3">
                                    <label for="emailidInput" class="form-label"> Thumbnail Image(Try to upload same height and width (371px to 371px))</label>
                                    <input type="file" name="home_image"  class="form-control img1">
                                 
                                </div>
                        
                                <div class="mb-3">
                                    <label for="emailidInput" class="form-label">Sub Image (choose one or more)</label>
                                    <input type="file" name="home_sub[]" multiple class="form-control img2">
                                    
                                </div>
                             
                                <div class="mb-3">
                                <div>
                                    <label for="status-field"
                                        class="form-label">Category/Menu</label>
                                    <select class="form-control"
                                        data-trigger
                                        name="category_id"
                                        id="status-field">
                                        <option value="1">IIlustration & Concept Art
                                        </option>
                                        <option value="2">Logo & Branding
                                        </option>
                                        <option value="3">Social Media Design
                                        </option>
                                        <option value="4">Product Packagin
                                        </option>
                                        <option value="5">UI/UX Design
                                        </option>
                                        <option value="6">Poster & Typography
                                        </option>
                                        <option value="7">Animation & 3D
                                        </option>
                                        <option value="8">Apparel Design
                                        </option>
                                     
                                        <option value="9">Publishing
                                        </option>
                                        <option value="10">Other
                                        </option>
                                    </select>
                                </div>
                                 </div>
                                <div class="mb-3">

                                <div>
                                    <label for="status-field"
                                        class="form-label">Status</label>
                                    <select class="form-control"
                                        data-trigger
                                        name="status"
                                        id="status-field">
                                      
                                     
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
                                        Image</button>
                                  
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
