@extends('admin.master')
@section('body')
@php
use App\Models\CategoryController;
use App\Models\ProductSubImage;
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
                                        <th class="sort" data-sort="customer_name">Product ID</th>
                                        <th class="sort" data-sort="customer_name">Product Name</th>
                                        <th class="sort" data-sort="email">Price</th>
                                        <th class="sort" data-sort="phone">Status</th>
                                        <th class="sort" data-sort="phone">Create Date</th>
                                        <th class="sort" data-sort="phone">Image</th>
                                        <th class="sort" data-sort="date">Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                               <tr>
                                    @foreach($Products as $item)
                                    <td class="customer_name">#{{$item->id }}</td>
                                <td class="customer_name">{{substr($item->product_name, 0, 50 )}} ..</td>
                                <td class="email">{{$item->price}}</td>
                                
                             
                                <td class="status"><span class="badge badge-soft-success text-uppercase">{{$item->status}}</span></td>
                                <td class="status"><span class="badge badge-soft-success text-uppercase">{{$item->created_at}}</span></td>

                                <td class="email"> <img src="{{asset($item->product_image)}}" width="100px" alt=""></td>

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
                                                        id=""><a href="#"><img width=" 16%" style="margin-top: -10px" src="{{asset('/')}}assets/images/update-gif.gif" border="0" alt="animated-computer-image-0116" /></a> Update Record #{{$item->id}}.</h5>
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        id="close-modal"></button>
                                                </div>
                                                <form action="{{route('products.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                                         @method('put')    
                                                         @csrf
                                                        <input type="hidden" name="id" value="{{$item->id}}">
                                                    <div class="modal-body">

                                                    <div class="mb-3">
                                                            <label for="customername-field"
                                                                class="form-label">
                                                                    Product Name
                                                                </label>
                                                            <input type="text"
                                                                id="customername-field"
                                                                name="product_name"
                                                                class="form-control"
                                                                value="{{$item->product_name}}"
                                                                placeholder="Enter name"

                                                                required />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="customername-field"
                                                                class="form-label">
                                                                    Price
                                                                </label>
                                                            <input type="text"
                                                                id="customername-field"
                                                                class="form-control"
                                                                name="price"
                                                                value="{{$item->price}}"
                                                                placeholder="Enter price"
                                                                required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="customername-field"
                                                                class="form-label">
                                                                    Discount Price
                                                                </label>
                                                            <input type="text"
                                                                id="customername-field"
                                                                name="d_price"
                                                                value="{{$item->d_price}}"
                                                                class="form-control"
                                                                placeholder="Enter discount price"
                                                                required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="customername-field"
                                                                class="form-label">
                                                                    Qty
                                                                </label>
                                                            <input type="number"
                                                                id="customername-field"
                                                                name="qty"
                                                                value="{{$item->qty}}"
                                                                class="form-control"
                                                                placeholder="Enter product qty"
                                                                required />
                                                        </div>
                                                        <div class="row mb-3">
                                                        <div class="col-4">
                                                        <label for="customername-field"
                                                                class="form-label">
                                                                    Color-1
                                                                </label>
                                                        <input type="color" class="form-control" name="color_1" value="{{$item->color_1}}">
                                                        </div>
                                                        <div class="col-4">
                                                        <label for="customername-field"
                                                                class="form-label">
                                                                    Color-2
                                                                </label>
                                                        <input type="color" class="form-control"  name="color_2" value="{{$item->color_2}}">
                                                        </div>
                                                        <div class="col-4">
                                                        <label for="customername-field"
                                                                class="form-label">
                                                                    Color-3
                                                                </label>
                                                        <input type="color" class="form-control"  name="color_3" value="{{$item->color_3}}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="customername-field"
                                                                    class="form-label">
                                                                    Size
                                                        </label>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input"<?PHP echo ( $item->sm == 'SM')? 'checked': ''; ?>  type="checkbox" id="gridCheck" name="sm" value="SM">
                                                            <label class="form-check-label" for="gridCheck">
                                                                SM
                                                            </label>
                                                        </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck" <?PHP echo ( $item->md == 'MD')? 'checked': ''; ?> name="md" value="MD">
                                                            <label class="form-check-label" for="gridCheck">
                                                            MD
                                                            </label>
                                                        </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck" <?PHP echo ( $item->xl == 'XL')? 'checked': ''; ?> f name="xl" value="XL">
                                                            <label class="form-check-label" for="gridCheck">
                                                                XL
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="customername-field"
                                                                    class="form-label">
                                                                    Show with
                                                        </label>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck"<?PHP echo ( $item->best_sellar == 'best_sellar')? 'checked': ''; ?> name="best_sellar" value="best_sellar">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Best sellar
                                                            </label>
                                                        </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck"<?PHP echo ( $item->new_collection == 'new_collection')? 'checked': ''; ?>  name="new_collection" value="new_collection">
                                                            <label class="form-check-label" for="gridCheck">
                                                            New Collection
                                                            </label>
                                                        </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck"<?PHP echo ( $item->low_price == 'low_price')? 'checked': ''; ?>  name="low_price" value="low_price">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Low Price
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="customername-field"
                                                            class="form-label">
                                                                Product description
                                                            </label>
                                                        <textarea id="summernote{{$item->id}}" rows="" cols="" name="product_description">{!!$item->product_description!!}</textarea>
                                                    </div>
                                                    <script>
                                                        $('#summernote{{$item->id}}').summernote({
                                                        placeholder: 'Wirte your product description',
                                                        tabsize: 2,
                                                        height: 120,
                                                        toolbar: [
                                                            ['style', ['style']],
                                                            ['font', ['bold', 'underline', 'clear']],
                                                            ['color', ['color']],
                                                            ['para', ['ul', 'ol', 'paragraph']],
                                                            ['table', ['table']],
                                                            ['insert', ['link', 'picture', 'video']],
                                                            ['view', ['fullscreen', 'codeview', 'help']]
                                                        ]
                                                        });
                                                    </script>
                                                        <div class="mb-4">
                                                            <label for="emailidInput" class="form-label">Product Thumbnail Image(Try to upload same height and width (200px to 200px))</label>
                                                            <input type="file" name="product_image"  class="form-control img1">

                                                            <div><img src="{{asset($item->product_image)}}" width="100px" alt=""></div>
                                                        
                                                        </div>
                                                
                                                        <div class="mb-4">
                                                            <label for="emailidInput" class="form-label">Sub Image (choose one or more and Try to upload same height and width (200px to 200px))</label>
                                                            <input type="file" name="product_sub[]" multiple class="form-control img2">
                                                             @php 
                                                              $subimg =  ProductSubImage::where('product_id',$item->id)->get();   
                                                             @endphp
                                                            <div>
                                                                @foreach($subimg as $img)
                                                               <img src="{{asset($img->product_sub)}}" width="100px" alt="">
                                                                @endforeach
                                                             </div>
                                                            </div>
                                                    
                                                        <div class="mb-3">
                                                        <div>
                                                            <label for="status-field"
                                                                class="form-label">Category/Menu</label>
                                                            <select class="form-control"
                                                                data-trigger
                                                                name="category_id"
                                                                id="status-field">
                                                                @php 
                                                                $cat =  CategoryController::where('id',$item->category_id)->first();   
                                                                @endphp
                                                                @if(!empty($cat))
                                                                <option value="{{$cat->id}}">{{$cat->category_name}}
                                                                </option>
                                                                @endif
                                                              
                                                                @foreach($category as $cat1)
                                                                <option value="{{$cat1->id}}">{{$cat1->category_name}}
                                                                 </option>
                                                                 @endforeach
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="mb-3">

                                                        <div>
                                                            <label for="status-field"
                                                                class="form-label">Status</label>
                                                            <select class="form-control"
                                                           
                                                                name="status"
                                                                id="status-field">
                                                                <option value="{{$item->status}}">{{$item->status}} </option>
                                                            
                                                                <option value="Active">Active
                                                                </option>
                                                                <option value="Inactive">Inactive
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
                                                                Product</button>
                                                        
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
                                                                product "#{{$item->id}}" ?</p>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('products.destroy', $item->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                              
                                                       <div>                                         
                                                        <button type="button"
                                                            class="btn w-sm btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn w-sm btn-danger "
                                                            id="delete-record">Yes, Delete
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
                        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                                             
                             @csrf
                            <div class="modal-body">

                             <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Product Name
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        name="product_name"
                                        class="form-control"
                                        placeholder="Enter name"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Price
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        class="form-control"
                                        name="price"
                                        placeholder="Enter price"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Discount Price
                                        </label>
                                    <input type="text"
                                        id="customername-field"
                                        name="d_price"
                                        class="form-control"
                                        placeholder="Enter discount price"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Qty
                                        </label>
                                    <input type="number"
                                        id="customername-field"
                                        name="qty"
                                        class="form-control"
                                        placeholder="Enter product qty"
                                        required />
                                </div>
                                <div class="row mb-3">
                                <div class="col-4">
                                <label for="customername-field"
                                        class="form-label">
	                                        Color-1
                                        </label>
                                <input type="color" class="form-control" name="color_1" value="#ff0000">
                                </div>
                                <div class="col-4">
                                <label for="customername-field"
                                        class="form-label">
	                                        Color-2
                                        </label>
                                <input type="color" class="form-control"  name="color_2" value="#002aff">
                                </div>
                                <div class="col-4">
                                <label for="customername-field"
                                        class="form-label">
	                                        Color-3
                                        </label>
                                <input type="color" class="form-control"  name="color_3" value="#44ff00">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="customername-field"
                                            class="form-label">
                                               Size
                                </label>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="sm" value="SM">
                                    <label class="form-check-label" for="gridCheck">
                                        SM
                                    </label>
                                </div>
                                </div>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="md" value="MD">
                                    <label class="form-check-label" for="gridCheck">
                                       MD
                                    </label>
                                </div>
                                </div>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="xl" value="XL">
                                    <label class="form-check-label" for="gridCheck">
                                        XL
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="customername-field"
                                            class="form-label">
                                               Show with
                                </label>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="best_sellar" value="best_sellar">
                                    <label class="form-check-label" for="gridCheck">
                                        Best sellar
                                    </label>
                                </div>
                                </div>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="new_collection" value="new_collection">
                                    <label class="form-check-label" for="gridCheck">
                                       New Collection
                                    </label>
                                </div>
                                </div>
                                <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="low_price" value="low_price">
                                    <label class="form-check-label" for="gridCheck">
                                        Low Price
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                    <label for="customername-field"
                                        class="form-label">
	                                        Product description
                                        </label>
                                    <textarea id="summernote" rows="" cols="" name="product_description"></textarea>
                                </div>
                                      
                                <div class="mb-4">
                                    <label for="emailidInput" class="form-label">Product Thumbnail Image(Try to upload same height and width (200px to 200px))</label>
                                    <input type="file" name="product_image"  class="form-control img1">
                                 
                                </div>
                        
                                <div class="mb-4">
                                    <label for="emailidInput" class="form-label">Sub Image (choose one or more and Try to upload same height and width (200px to 200px))</label>
                                    <input type="file" name="product_sub[]" multiple class="form-control img2">
                                    
                                </div>
                             
                                <div class="mb-3">
                                <div>
                                    <label for="status-field"
                                        class="form-label">Category/Menu</label>
                                    <select class="form-control"
                                        data-trigger
                                        name="category_id"
                                        id="status-field">
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}
                                        </option>
                                       @endforeach
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
                                        <option value="Inactive">Inactive
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
                                        Product</button>
                                  
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
    <script>
    $('#summernote').summernote({
      placeholder: 'Wirte your product description',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
  <script>
    $('#summernote1').summernote({
      placeholder: 'Wirte your product description',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
    </div>
   
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } )
    </script>
   
@endsection
