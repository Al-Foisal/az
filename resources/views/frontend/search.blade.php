@extends('frontend.master')
@section('body')
@if(!empty($setting->title))                                     
   <title>{{$setting->title}}</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    @endif
    <style>
        .logo-light{
          display:block;
          
        }
        .logo-dark{
          display:none;
          
        }
        .search{
          border-left: none;
          border-top: none;
          border-right: none;
          border-bottom: 1px solid #383636;
          text-align: center;
          background:#00000000;
          outline:none;
          width: 250px;
        
        }
        .dropdown-content1 {
        display: none;
        position: absolute;
        z-index: 9999;
      }
      .dropdown-content1 .dropdwon_menu {
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        border-radius: 10px;
        z-index: 9999;
        width: 550px;
        margin-top: 10px;
      }
      .dropdown1:hover .dropdown-content1 {
        display: flex;
        border-radius: 10px;
      }
      .slider2.round {
          border-radius: 34px;
      }
      .slider2 {
          position: absolute;
          cursor: pointer;
          top: -2px;
          left: 0;
          right: 0;
          bottom: -2px;
          background-color: rgb(215 212 212);
          -webkit-transition: .4s;
          transition: .4s;
      }
  </style>
<header class="container">
      <div class="row ">
        <div class="col-2 col-md-2">
              <a href="{{url('/')}}">
              @if(!empty($setting->mlogo))
              <img class="logo-light logo  light-logo" id="logoimag"style="width: 110px; margin-top: 42px;display:none;" src="{{asset($setting->mlogo)}}" alt="">
              @endif
              @if(!empty($setting->slogo))
              <img class="logo-light logo dark-logo" id="logoimag"style="width: 110px; margin-top: 42px;" src="{{asset($setting->slogo)}}" alt="">
              @endif
            </a>
        </div>
        <div class="col-6 col-md-4" style="margin-top:60px">
          <form action="{{url('search-images')}}" method="POST" id="search" style="display:inline">
              @csrf
                <i  onclick="document.getElementById('search').submit();"  style="margin-right: -31px;margin-left: 51px; cursor: pointer;" class="fa-solid fa-magnifying-glass"></i>
                <input class="search" type="search" name="search" placeholder="search">
          </form>
                  
        </div>
        <div class="col-4 col-md-6"style="margin-top:52px">
        <div class="mobil-menu">
        <li class="form-check   mod nav-item dark-button"  style="list-style: none; display: inline-block;" >
          
          <img class="" id="logoimag"style="width: 55px; height: 30px; " src="{{asset('/')}}toggole-dark.png" alt="">
              
         
          </li>
          <li class="form-check   mod nav-item light-button dark-btn " style="list-style: none;display: none;">
          <img class="" id="logoimag"style="width: 55px; height: 30px; " src="{{asset('/')}}toggole-light.png" alt=""style=" display: none">
          </li>
       
            
          <a type="button"  style="list-style: none; display: inline-block;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i  class="fa-solid fa-bars menubar"></i></a>
        </div>
          <div class="desctop-menu" >
          <ul class="social-link">
            <li>
              <div class="dropdown1">
                <a id =""class="" style="font-size: 20px;font-family: Noto sans;font-weight:600" class="dropbtn"> Design<i class="fa-solid fa-angle-down p-1"></i></a>
                <div class="dropdown-content1">
                  <div class="row shadow-lg p-3 mb-5 dropdwon_menu"id="">
                      <div class="col-6">
                        <form action="{{url('category-images')}}" method="POST" id="design1">@csrf
                          <input type="hidden" value="1" name="id">
                        <a onclick="document.getElementById('design1').submit();" class="d-block"> IIlustration & Concept Art</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design2">@csrf
                        <input type="hidden" value="2" name="id">
                          <a onclick="document.getElementById('design2').submit();"  class="d-block "> Logo & Branding</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design3">@csrf
                        <input type="hidden" value="3" name="id">
                            <a onclick="document.getElementById('design3').submit();"  class="d-block ">  Social Media Design</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design4">@csrf
                        <input type="hidden" value="4" name="id">
                            <a onclick="document.getElementById('design4').submit();"  class="d-block ">Product Packaging</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design5">@csrf
                        <input type="hidden" value="5" name="id">
                            <a onclick="document.getElementById('design5').submit();"  class="d-block ">UI/UX Design</a>
                        </form>
                    
                      </div> 
                      <div class="col-6">
                          <form action="{{url('category-images')}}" method="POST" id="design6">@csrf
                        <input type="hidden" value="6" name="id">
                            <a onclick="document.getElementById('design6').submit();"  class="d-block">Poster & Typography</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design7">@csrf
                        <input type="hidden" value="7" name="id">
                            <a onclick="document.getElementById('design7').submit();"  class="d-block "> Animation & 3D</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design8">@csrf
                        <input type="hidden" value="8" name="id">
                            <a onclick="document.getElementById('design8').submit();"  class="d-block"> Apparel Design</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design9">@csrf
                        <input type="hidden" value="9" name="id">
                            <a onclick="document.getElementById('design9').submit();"  class="d-block "> Publishing</a>
                        </form>
                        <form action="{{url('category-images')}}" method="POST" id="design10">@csrf
                        <input type="hidden" value="10" name="id">
                            <a onclick="document.getElementById('design10').submit();"  class="d-block "> Other</a>
                        </form>
                        
                      </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a id ="Photography"class="" style="font-size: 20px;font-family: Noto sans;font-weight:600">Photography</a>
            </li>
            <li>
              <a id ="About"class="" style="font-size: 20px;font-family: Noto sans;font-weight:600">About</a>
            </li>
            <li>
              <a id="Contact"class="" style="font-size: 20px;font-family: Noto sans;font-weight:600"> Contact  </a>
            </li>
            <li class="form-check   mod nav-item dark-button"  >
          
            <img class="" id="logoimag"style="width: 65px; height: 30px; " src="{{asset('/')}}toggole-dark.png" alt="">
                
            </label>
            </li>
            <li class="form-check   mod nav-item light-button " style="display: none;">
            <img class="" id="logoimag"style="width: 65px; height: 30px; " src="{{asset('/')}}toggole-light.png" alt="">
            </li>
          </ul>
        </div>
      </div>

      <!-- about menu link -->
      <script>
        document.getElementById("Photography").onclick = function () {
                  location.href =" {{url('photography')}}";
              };
        
              document.getElementById("About").onclick = function () {
                  location.href =" {{url('about')}}";
              };
              document.getElementById("Contact").onclick = function () {
                  location.href =" {{url('contact-us')}}";
              };

      </script>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:100vh;text-align: center;">
            <ul class="" style="list-style: none;">
                @if(!empty($setting->slogo))
                <img class="logo-light  " style="margin-left: 100px;margin-bottom: 23px;" src="{{asset($setting->slogo)}}" width="150px" alt="">
                @endif
          
                <li>
                  <a href ="{{url('photography')}}" class="" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;">Photography</a>
                </li>

                <li>
                  <a href =" {{url('about')}}" class="" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;">About</a>
                </li>
                <li>
                  <a href =" {{url('contact-us')}}"class="" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Contact  </a>
                </li>
                <li>
                <div class="dropdown1">
                    <a id =""class="" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;" class="dropbtn"> Design <i class="fa-solid fa-angle-down p-1"></i></a> 
                    <div class="dropdown-content1" style="margin-left: 25px;">
                      <div class="rowp-3 mb-5 "id="">
                          <div class="col-12 ">
                            <form action="{{url('category-images')}}" method="POST" id="design1">@csrf
                            <input type="hidden" value="1" name="id">
                                <a onclick="document.getElementById('design1').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> IIlustration & Concept Art</a>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design2">@csrf
                              <input type="hidden" value="2" name="id">
                                <a onclick="document.getElementById('design2').submit();" class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Logo & Branding</a>
                              </form>
                            <form action="{{url('category-images')}}" method="POST" id="design3">@csrf
                              <input type="hidden" value="3" name="id">
                                <a onclick="document.getElementById('design3').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Social Media Design</a>>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design4">@csrf
                            <input type="hidden" value="4" name="id">
                                <a onclick="document.getElementById('design4').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;">Product Packaging</a>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design5">@csrf
                            <input type="hidden" value="5" name="id">
                                <a onclick="document.getElementById('design5').submit();"  class="d-block" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;">   UI/UX Design</a>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design6">@csrf
                            <input type="hidden" value="6" name="id">
                                <a onclick="document.getElementById('design6').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Poster & Typography</a>
                            </form>
                          
                            <form action="{{url('category-images')}}" method="POST" id="design7">@csrf
                            <input type="hidden" value="7" name="id">
                                <a onclick="document.getElementById('design7').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Animation & 3D</a>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design8">@csrf
                            <input type="hidden" value="8" name="id">
                                <a onclick="document.getElementById('design8').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Apparel Design </a>
                            </form>
                            <form action="{{url('category-images')}}" method="POST" id="design9">@csrf
                            <input type="hidden" value="9" name="id">
                                <a onclick="document.getElementById('design9').submit();" class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Publishing</a>
                            </form>
                            
                            <form action="{{url('category-images')}}" method="POST" id="design10">@csrf
                            <input type="hidden" value="10" name="id">
                                <a onclick="document.getElementById('design10').submit();"  class="d-block p-1" style="font-size: 20px;font-family: Noto sans;font-weight:600;color:#000;"> Other </a>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
                </li>
            </ul>
          </div>
          <div class="modal-footer text-center ">   
          <ul class="social-link" style="">
        
          <li>

              <a href="https://www.instagram.com/_aepg_/"class="" style="font-size: 30px; color:#000;"><i class="fa-brands fa-instagram"></i></a>
          </li>
          <li>
              <a  href="https://www.linkedin.com/in/ashickelahi/"class="" style="font-size: 30px;color:#000;"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
            <li>
              <a href="https://twitter.com/AshickElahi"class="" style="font-size: 30px;color:#000;">
              <i class="fa-brands fa-twitter"></i></a>
            </li>
            <li>
              <a  href="https://www.behance.net/ashickelahi"class="" style="font-size: 30px;color:#000;">
              <i class="fa-brands fa-behance"></i> </a>
            </li>
            <li>
              <a  href="https://dribbble.com/ashickelahi"class="" style="font-size: 30px;color:#000;"> 
              <i class="fa-solid fa-basketball"></i></a>
            </li>
            <li>
              <a  href="https://www.facebook.com/ashickelahi.vd"class="" style="font-size: 30px;color:#000;"> 
              <i class="fa-brands fa-facebook-f"></i></a>
            </li>
          </ul> 
        </div>
      </div>
  </header>


  <main>
  <style>
    .top-phragrap1 {
    padding: 5px 337px;
    font-size: 20px;
    margin-top: 130px;
    /* margin-bottom: 80px; */
    font-family: Noto sans;
    font-style: normal;
    font-size: 25px;
    line-height: 1.4em;
    letter-spacing: .05em;
    text-transform: none;
}
  </style>
    <!-- paragraph-->
    <section>
        <p class="text-center p-text top-phragrap1">
     

</p>
   </section>
     <!-- paragraph-->
     <!-- Gallery image-->
    <section>
        <div class="container gallery-mobile">
            <!-- Gallery -->
        

              <div class="row" id="product">
                @if(count($search_images ))
                @foreach($search_images as $item)
             

                <div class="col-4 image-hover ">
                <a href="{{url('photo-details',[$item->id])}}">
                  <img
                    src="{{asset($item->home_image)}}"
                    class=" shadow-1-strong  img-p"
                    alt="{{$item->title}}"/>
                    </a>
                </div>
                
                @endforeach
                @else
                <h5 class="text-center"> No image found.</h5>
                @endif
                
            </div>
           
        </div>
      
     
        <div class="text-center mt-4">
        <a class="" style="    font-family: Mr Dafoe ;
    font-size: 30px"> @if(!empty($allpage->home_bottom))   {{$allpage->home_bottom}}@endif </a>
        </div>
        <style type="text/css">
        .social-link li
        {
          display: inline-flex;
          list-style-type: none;
          vertical-align: middle;
          padding: 0px 10px;
          cursor: pointer;
        }
      
    </style>
          
   <div class="text-center mt-3">
      <ul class="social-link" style="padding-left: inherit;">

       <li>
          <a id ="instagram"class="" style="font-size: 30px;"><i class="fa-brands fa-instagram"></i></a>
       </li>
       <li>
          <a class="" id="linkedin" style="font-size: 30px;"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        <li>
          <a id ="twitter"class="" style="font-size: 30px;"><i class="fa-brands fa-twitter"></i></a>
        </li>
        <li>
          <a id ="behance"class="" style="font-size: 30px;"> <i class="fa-brands fa-behance"></i> </a>
        </li>
        <li>
          <a id ="basketball"class="" style="font-size: 30px;"> <i class="fa-solid fa-basketball"></i></a>
        </li>
        <li>
          <a id ="facebook"class="" style="font-size: 30px;"> <i class="fa-brands fa-facebook-f"></i></a>
        </li>
      </ul> 

   </div>
   <div class="text-center mt-4 mb-5">
        <div class="" style="font-family: Myriad Pro  - Bold;
    font-size: 16px">@if(!empty($setting->footer)){{$setting->footer}}@endif
  
        </div>
  </main>
  <script type="text/javascript">
         document.getElementById("instagram").onclick = function () {
        location.href = "https://www.instagram.com/_aepg_/ ";
        };
        document.getElementById("facebook").onclick = function () {
            location.href = "https://www.facebook.com/ashickelahi.vd";
        };
        document.getElementById("basketball").onclick = function () {
            location.href = " https://dribbble.com/ashickelahi ";
        };
        document.getElementById("behance").onclick = function () {
            location.href = "https://www.behance.net/ashickelahi";
        };
        document.getElementById("twitter").onclick = function () {
            location.href ="https://twitter.com/AshickElahi";
        };
        document.getElementById("linkedin").onclick = function () {
            location.href ="https://www.linkedin.com/in/ashickelahi/ ";
        };
        document.getElementById("QuickTech").onclick = function () {
            location.href ="https://quicktech-ltd.com/";
        };
       </script>
  <style>
    #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 14px;
  border: 1px solid #969696;
  outline: none;
  width: 40px;
  height: 40px;
  background: #ff000000;
  cursor: pointer;
  padding: 10px;
  border-radius: 50%;
}
  </style>
  <a onclick="topFunction()" id="myBtn" title="Go to top"><i style="margin-left: 3px;" class="fa-solid fa-arrow-up"></i></a>

  <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

@endsection