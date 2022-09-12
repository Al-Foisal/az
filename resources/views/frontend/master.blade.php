<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(!empty($setting->mlogo))
    <link rel="shortcut icon" href="{{($setting->mlogo)}}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(!empty($setting->title)){{$setting->title}}@endif</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css" >
    <link rel="stylesheet" href="{{asset('/')}}fontend-asset/header.css" >
    <link rel="stylesheet" href="{{asset('/')}}fontend-asset/footer.css" >
    <link rel="stylesheet" href="{{asset('/')}}fontend-asset/style.css" >
    <link rel="stylesheet" href="{{asset('/')}}fontend-asset/responsiv.css" >
    <style>
        a:hover{
            text-decoration: none;
            color:#FFA502
        }
    </style>
</head>
<body>
       <!--header start--> 
    <header>
        <div class="overlay"></div>
        <nav class="navbar navbar-expand-md  main-menu" style="box-shadow:none">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                        <i class="bx bx-menu icon-single"></i>
                    </button>

            <a class="navbar-brand" href="{{route('/')}}">
            <h4 class="font-weight-bold logo-hover">
                @if(!empty($setting->title))
                <img class="logo-header rounded" src="{{asset($setting->slogo)}}" alt="">
                @endif
             </h4>
            </a>

            <ul class="navbar-nav ml-auto d-block d-md-none">
            <li class="nav-item">
                <a class="btn btn-cart" href="#"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger"style="top: -27px;
    margin-left: -38px;">{{count($cartproducts)}}</span></a>
            </li>
            </ul>

            <div class="collapse navbar-collapse">
            <form class="form-inline my-2 my-lg-0 mx-auto">
                <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
                <button class="btn search my-2 my-sm-0" type="submit"><i class="bx bx-search"></i></button>
            </form>

            <ul class="navbar-nav">
                <li class="nav-item ml-md-3">
                @if(Session::get('customer_id'))
                    <a class="btn login-register " href="{{route('customer-profile')}}"><i class="bx bxs-user-circle mr-1"></i>Go Your Profile</a>
                    @else
                    <a class="btn login-register " href="{{route('customer-login')}}"><i class="bx bxs-user-circle mr-1"></i> Log In or Register</a>
                    @endif

                </li>
                <li class="nav-item">
                   <a class="btn btn-cart" href="{{route('cart-products')}}"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger" style="top: -27px;
    margin-left: -38px;">{{count($cartproducts)}}</span></a>
                </li>
               
            </ul>
            </div>

        </div>
        </nav>
        <nav class="navbar navbar-expand-md menu-background sub-menu">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ">
                @foreach($category as $item)
                    <li class="nav-item active">
                      <a class="nav-link" href="{{route('category-products', $item->id)}}">{{$item->category_name}}<span class="sr-only">(current)</span></a>
                    </li>
                @endforeach
          <!--  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Support</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Delivery Information</a>
                        <a class="dropdown-item" href="#">Privacy Policy</a>
                        <a class="dropdown-item" href="#">Terms & Conditions</a>
                    </div>
                </li> -->
              
            </ul>
            </div>
        </div>
        </nav>
        <div class="search-bar d-block d-md-none">
        <div class="container-fluid p-2">
            <div class="row">
            <div class="col-12">
                <form class="form-inline mb-3 mx-auto">
                <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
                <button class="btn search" type="submit"><i class="bx bx-search"></i></button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <!-- Sidebar -->
        <nav id="sidebar">
        <div class="sidebar-header">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-10 pl-0">
                <a class="btn bgcolor" href="{{route('customer-login')}}"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
                </div>

                <div class="col-2 text-left">
                <button type="button" id="sidebarCollapseX" class="btn btn-link">
                                    <i class="bx bx-x icon-single"></i>
                                </button>
                </div>
            </div>
            </div>
        </div>

        <ul class="list-unstyled components links">
            @foreach($category as $item)
                <li class="active">
                  <a href="{{route('category-products', $item->id)}}" class="text-dark bg-light"><i class="bx bx-home mr-3"></i> {{$item->category_name}}</a>
                </li>
             
            @endforeach
          
        </ul>
        </nav>
    </header>
        <!--header start--> 
      
      
      
      @yield('body')
      <!--Footer start--> 
        <footer class="footer-section">
        <div class="container-fluid">
    
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50 "style="margin-top:-31px">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img class="logo-header" src="{{asset('/')}}fontend-asset/image/logo.png" alt=""></a>
                            </div>
                            <div class="footer-text">
                            @if(!empty($setting->about_site))
                                <p> {{$setting->about_site}}</p>
                            @endif
                            </div>
                            <!--<div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3 class="text-center"style="margin-left: -131px;">Useful Links</h3>
                            </div>
                            <ul class="text-center">
                                <li><a href="{{route('/')}}">Home</a></li>
                                <li><a href="{{route('about-us')}}">About</a></li>
                                <li><a href="{{route('Privacy')}}">Privacy</a></li>
                                <li><a href="{{route('Terms-&-condition')}}">Terms & condition</a></li>
                                <li><a href="{{route('contact-us')}}">Contact us</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="single-cta">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="cta-text">
                                    <h4>Find us</h4>
                                    <span>  @if(!empty($setting->address))
                                       {{$setting->address}}
                                       @endif</span><br>
                                    <span><i class='bx bxs-phone-call' style="font-size: 21px; margin-top: 2px;  padding-right: 5px;color: #fff"></i>Phone:  @if(!empty($setting->phone1))
                                       {{$setting->phone1}}
                                       @endif</span><br>
                                    <span><i class='bx bxs-envelope' style="font-size: 21px; margin-top: 2px;  padding-right: 5px;color: #fff" ></i>  Email: @if(!empty($setting->email))
                                       {{$setting->email}}
                                       @endif</span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="copyright-text">
                            <p> @if(!empty($setting->footer))
                                       {{$setting->footer}}
                                       Design & Develop by
                                       @endif<a href="https://quicktech-ltd.com/">QuickTech IT.Ltd</a></p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>
        <!--Footer end-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script>
    <script>
        $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").addClass("active");
        });

        $("#sidebarCollapseX").on("click", function() {
            $("#sidebar").removeClass("active");
        });

        $("#sidebarCollapse").on("click", function() {
            if ($("#sidebar").hasClass("active")) {
            $(".overlay").addClass("visible");
            console.log("it's working!");
            }
        });

        $("#sidebarCollapseX").on("click", function() {
            $(".overlay").removeClass("visible");
        });
        });

    </script>
    @include('sweetalert::alert')
</body>
</html>