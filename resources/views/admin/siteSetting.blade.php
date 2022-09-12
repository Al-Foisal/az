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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                        <li class="breadcrumb-item active">Website Setting Form</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Website Setting Form </h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted">Show Form</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        @if($message1 = Session::get('message'))
                                        <div class="alert alert-warning text-center alert-dismissible " id="panel" style="  background-color: #0d1428; color:rgb(255, 255, 255); ">
                                       
                                          {{ $message1}}
                                        </div>
                                        @endif
                                        <style>
                                            .form-control{
                                                font-size: 0.8rem !important;
                                                font-weight: 300 !important;
                                                font-family: 'Times New Roman';
                                                color: #000000 !important;
                                            }
                                            .form-label{
                                                font-size: 1rem !important;
                                                font-weight: 500 !important;
                                                font-family: auto;
                                                color: #000000 !important;
                                            }
                                        </style>
                                        <form action="{{route('add-siteInfo')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Site Title</label>
                                                        <input @if(!@empty($site->title))value=" {{$site->title}}"@endif type="text" class="form-control" name="title" placeholder="Enter your site title" id="title">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="lastNameinput" class="form-label">Site Name</label>
                                                        <input type="text" name="name" @if(!@empty($site->name))value=" {{$site->name}}"@endif  class="form-control" placeholder="Enter your Site name" id="name">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="compnayNameinput" class="form-label">About site</label>
                                                        <input @if(!@empty($site->about_site))value="{{$site->about_site}}"@endif type="text" name="about_site" class="form-control" placeholder="Enter About your site" id="about_site">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="phonenumberInput" class="form-label">Email</label>
                                                        <input @if(!@empty($site->email) ) value="{{$site->email}}"@endif type="email" name="email" class="form-control" placeholder="test@gmail.com" id="email">
                                                    </div>
                                                </div>
                                                
                                                <!--end col-->
                                              
                                                <!--end col-->
                                                <!--
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social Icon 1 <a href="https://fontawesome.com/icons"> (fontawesome-6)</a></label>
                                                        <input @if(!@empty($site->social_icon_1))value=" {{$site->social_icon_1}}"@endif type="text" name="social_icon_1" class="form-control" placeholder="fa-brands fa-facebook-square" id="icon">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social link 1 </label>
                                                        <input @if(!@empty($site->social_link_1) )value="{{$site->social_link_1}}"@endif type="text" name="social_link_1" class="form-control" placeholder="https://www.facebook.com/" id="link1">
                                                    </div>
                                                </div>
                                          
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social Icon 2 <a href="https://fontawesome.com/icons"> (fontawesome-6)</a></label>
                                                        <input @if(!@empty($site->social_icon_2) )value="{{$site->social_icon_2}}"@endif type="text" name="social_icon_2" class="form-control" placeholder="fa-brands fa-facebook-square" id="icon2">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social link 2 </label>
                                                        <input @if(!@empty($site->social_link_2) )value="{{$site->social_link_2}}"@endif type="text" name="social_link_2" class="form-control" placeholder="https://www.facebook.com/" id="link1">
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-4 ">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social Icon 3 <a href="https://fontawesome.com/icons"> (fontawesome-6)</a></label>
                                                        <input @if(!@empty($site->social_icon_3))value=" {{$site->social_icon_3}}"@endif type="text" name="social_icon_3" class="form-control" placeholder="fa-brands fa-facebook-square" id="icon3">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social link 3 </label>
                                                        <input @if(!@empty($site->social_link_3) )value="{{$site->social_link_3}}"@endif type="text" name="social_link_3" class="form-control" placeholder="https://www.facebook.com/" id="link1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social Icon 4 <a href="https://fontawesome.com/icons"> (fontawesome-6)</a></label>
                                                        <input @if(!@empty($site->social_icon_4) )value="{{$site->social_icon_4}}"@endif type="text" name="social_icon_4" class="form-control" placeholder="fa-brands fa-facebook-square" id="icon4">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Social link 4 </label>
                                                        <input @if(!@empty($site->social_link_4) ) value="{{$site->social_link_4}}"@endif type="text" name="social_link_4" class="form-control" placeholder="https://www.facebook.com/" id="link1">
                                                    </div>
                                                </div>
                                                 -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Delivery charge($):</label>
                                                        <input type="text"name="delivery_charge" class="form-control"  id="delivery_charge" @if(!@empty($site->delivery_charge))value=" {{$site->delivery_charge}}"@endif >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Address</label>
                                                        <input @if(!@empty($site->address))value=" {{$site->address}}"@endif type="text" name="address" class="form-control" placeholder="Dhaka Bangladesh 1203" id="ADDRSS">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Phone 1</label>
                                                        <input @if(!@empty($site->phone1))value=" {{$site->phone1}}"@endif type="text" name="phone1" class="form-control" placeholder="+012345899" id="ADDRSS">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Phone 2</label>
                                                        <input @if(!@empty($site->phone2) )value="{{$site->phone2}}"@endif type="text" name="phone2" class="form-control" placeholder="+012345899" id="ADDRSS">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Footer Text</label>
                                                        <input @if(!@empty($site->footer) )value="{{$site->footer}}"@endif type="text" name="footer" class="form-control" placeholder="Design & Develop by quicktech it" id="ADDRSS">
                                                    </div>
                                                </div>
             

                                                <div class="col-md-12">
                                                    <label for="emailidInput" class="form-label">All meta and seo or other header code write in here in html format. </label>

                                                    <textarea name="header_code" id="summernote">@if(!@empty($site->header_code)) {!!$site->header_code!!}@endif </textarea>
                                                    <script>
                                                      $('#summernote').summernote({
                                                        placeholder: 'all meta and seo or other header code write in here in html format. this code placing in head section.',
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
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Site logo Light(Try to upload 110px X 110px size image )</label>
                                                        <input type="file" name="slogo" onchange="readURL(this);" class="form-control img1">
                                                        <div>@if(!@empty($site->title))<img id="image1" class="pre" width="100px" height="100px" src=" {{asset($site->slogo)}}"  alt="">@endif</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Site logo Dark(Try to upload 110px X 110px size image )</label>
                                                        <input type="file" name="mlogo" onchange="readURL1(this);" class="form-control img2">
                                                        <div> @if(!@empty($site->mlogo))<img id="image2" width="100px" height="100px" src="{{ asset($site->mlogo)}}"  alt="">@endif</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="emailidInput" class="form-label">About page containt </label>

                                                    <textarea name="about" id="summernotea">@if(!@empty($site->about)) {!!$site->about!!}@endif </textarea>
                                                    <script>
                                                      $('#summernotea').summernote({
                                                        placeholder: 'enter all about containt',
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
                                                <div class="col-md-12">
                                                    <label for="emailidInput" class="form-label">Privacy page containt </label>

                                                    <textarea name="privacy" id="summernotep">@if(!@empty($site->privacy)) {!!$site->privacy!!}@endif </textarea>
                                                    <script>
                                                      $('#summernotep').summernote({
                                                        placeholder: 'enter all privacy containt .',
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
                                                <div class="col-md-12">
                                                    <label for="emailidInput" class="form-label">Terms page containt </label>

                                                    <textarea name="terms" id="summernotet">@if(!@empty($site->terms)) {!!$site->terms!!}@endif </textarea>
                                                    <script>
                                                      $('#summernotet').summernote({
                                                        placeholder: 'enter all terms page contint',
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
                                                <!--end col-->
                                             
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary " style="float: left">Change</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       <style>
                         img{
                        max-width:180px;
                      }
                      input[type=file]{
                      padding:10px;
                     }
                        </style>  
                   
                       <script>
                           function readURL(img1) {
                                  if (img1.files && img1.files[0]) {
                                      var reader = new FileReader();
                      
                                      reader.onload = function (e) {
                                          $('#image1')
                                              .attr('src', e.target.result);
                                            
                                      };
                      
                                      reader.readAsDataURL(img1.files[0]);
                                  }
                              }
                           function readURL1(img2) {
                                  if (img2.files && img2.files[0]) {
                                      var reader = new FileReader();
                      
                                      reader.onload = function (e) {
                                          $('#image2')
                                              .attr('src', e.target.result);
                                      };
                      
                                      reader.readAsDataURL(img2.files[0]);
                                  }
                              }
                    </script>
                     
            @endsection