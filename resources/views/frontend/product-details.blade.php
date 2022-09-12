  @extends('frontend.master')
  @section('body')
  
           <!--header start--> 
           <link rel="stylesheet" href="{{asset('/')}}fontend-asset/image-zoom.css">
    <div class="container-fluid mt-5 mb-5">   
    <div class="row">  
      <div class=" col-12 col-md-5 mobile-product-details ">
        <div id='lens'></div>
        <div id='slideshow-items-container'>
        @if(!empty($product->product_image))
        <img class='slideshow-items active' src="{{asset($product->product_image)}}">
        @endif
        @foreach($sub_images as $item)
        <img class='slideshow-items' src='{{asset($item->product_sub)}}'>
       @endforeach
        </div>
        <div id='result'style="z-index: 99999;"></div>
        <div class='row'style="margin-left: 1px;">
        @if(!empty($product->product_image))
        <img class='slideshow-thumbnails active' src='{{asset($product->product_image)}}'>
         @endif
         @foreach($sub_images as $item)
        <img class='slideshow-items' src='{{asset($item->product_sub)}}'>
         @endforeach
        </div>
      </div>
      <div class="col-7 col-md-4 ">
        <div class="details ">
            <h3 class="quicktech-product-details-title">@if(!empty($product->product_name)){{$product->product_name}}@endif</h3>
            <div class="rating">
                <div class="stars">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <span class="review-no"> 
                    <ul>
                        <i class='bx bxs-star'></i>

                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>   
                    </ul>
                </span>
            </div>
            <p class="product-description">@if(!empty($product->product_description)){!!$product->product_description!!}@endif</p>
           
          
        </div>
      </div>
      <div class="col-5 col-md-3">
         <h4 class="price">current price: <span>@if(!empty($product->d_price))${{$product->d_price}}@endif</span><del style="color: red;padding-left: 10px; font-size: 14px;">@if(!empty($product->price))${{$product->price}}@endif</del></h4>
            <p class="tag-details">This is good product cuatomer enjoyed this product!</p>
   
            <form action="{{route('add-to-cart')}}" method="POST">
                @csrf
        <h5 class="sizes mt-3">sizes:
            @if(!empty($product->sm))
            <span class="size" data-toggle="tooltip" title="small"><input type="radio" id="1" value="{{$product->sm}}" name="size"> {{$product->sm}}</span>
            @endif
            @if(!empty($product->md))
            <span class="size" data-toggle="tooltip" title="small"><input type="radio" id="1" value="{{$product->sm}}" name="size"> {{$product->md}}</span>
            @endif
         
            @if(!empty($product->xl))
            <span class="size" data-toggle="tooltip" title="small"><input type="radio" id="1" value="{{$product->sm}}" name="size"> {{$product->xl}}</span>
            @endif
           
        </h5>
        <h5 class="colors mt-3">colors: 
          @if(!empty($product->color_1))       
            <span class="color green"><input type="radio" id="1" value="{{$product->color_1}}" name="color"><span style="width: 16px;margin-left: 5px; height: 16px; background: {{$product->color_1}};border-radius: 4px;  display: inline-block;"></span></span>
          @endif
          @if(!empty($product->color_2))       
            <span class="color green"><input type="radio" id="1" value="{{$product->color_2}}" name="color"><span style="width: 16px;margin-left: 5px; height: 16px; background: {{$product->color_2}};border-radius: 4px;  display: inline-block;"></span></span>
          @endif
          @if(!empty($product->color_3))       
            <span class="color green"><input type="radio" id="1" value="{{$product->color_3}}" name="color"><span style="width: 16px;margin-left: 5px; height: 16px; background: {{$product->color_3}};border-radius: 4px;  display: inline-block;"></span></span>
          @endif
            
        </h5>
        <h5 class="sizes mt-3">Qty:
            <span class="size" data-toggle="tooltip" title="small"><input style="    width: 20%; border-radius: 6px;" type="number" value="1" min="1" name="qty"></span>
           
        </h5>
        <style>
           .quicktech-text{
            visibility: hidden;
           } 
        </style>
        <textarea class="quicktech-text" cols="1" row="1" name="add_cat" id="demo" ></textarea> 
        <textarea  class="quicktech-text" cols="1" row="1" name="add_bay" id="demo1" ></textarea> 
        <div class="action">
        <script>
            function ddd() {
            document.getElementById("demo").innerHTML = "1";
            }
            function dddd() {
            document.getElementById("demo1").innerHTML = "1";
            }
        </script>
        <input type="hidden" name="id" value="{{$product->id}}">
            <button class="quicktech-product-add-to-cart btn "onclick="ddd()" type="submit">add to cart</button>
            <button class="quicktech-product-add-to-cart2 btn "onclick="dddd()" type="submit">Bay Now</button>
        </div>
      
        </form>
      </div>
    </div>
    </div>
    
    <div class="container-fluid mb-5">
        <h1 class="quicktech-hading"> Related Products</h1>
        <hr>
    <div class="row">
    @foreach($rleated_product as $item)
        <div class="col-6 col-md-3">
            <div class="card text-center  quicktech-category-product-cart-border">
            <a href="{{route('product-details', $item->id)}}">
                <div class="text-center">
                    <img class="quicktech-product-table-img" src="{{asset($item->product_image)}}" alt="Card image cap">
                </div>
             
                <div class="card-body">
                    <h5 class="card-title quicktech-product-table-title text-capitalize">{{substr($item->product_name, 0, 30 )}}..</h5>
                    <h5 class="quicktech-product-table">${{$item->d_price}}<span><img src="{{asset('/')}}fontend-asset/image/prime.png" alt=""></span></h5>
                    </a>
                    <ul>
                        <i class='bx bxs-star'></i>

                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                    </ul>
                    <a href="{{route('add-cart', $item->id)}}" class="btn quicktech-product-table-button">Add To Cart</a>
                    <a href="{{route('product-details', $item->id)}}" class="btn quicktech-product-table-button2">Shop Now</a>
                </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
    <div class="container-fluid mb-5">
        <h1 class="quicktech-hading"> Best Seller </h1>
        <hr>
    <div class="row">
       @foreach($best_sellar as $item)
        <div class="col-6 col-md-3">
            <div class="card text-center  quicktech-category-product-cart-border">
            <a href="{{route('product-details', $item->id)}}">
                <div class="text-center">
                    <img class="quicktech-product-table-img" src="{{asset($item->product_image)}}" alt="Card image cap">
                </div>
             
                <div class="card-body">
                    <h5 class="card-title quicktech-product-table-title text-capitalize">{{substr($item->product_name, 0, 30 )}}..</h5>
                    <h5 class="quicktech-product-table">${{$item->d_price}}<span><img src="{{asset('/')}}fontend-asset/image/prime.png" alt=""></span></h5>
                    </a>
                    <ul>
                        <i class='bx bxs-star'></i>

                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                    </ul>
                    <a href="{{route('add-cart', $item->id)}}" class="btn quicktech-product-table-button">Add To Cart</a>
                    <a href="{{route('product-details', $item->id)}}" class="btn quicktech-product-table-button2">Shop Now</a>
                </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
    <div class="container-fluid mb-5">
        <h1 class="quicktech-hading"> New Collection</h1>
        <hr>
    <div class="row">
       
    @foreach($new_collection as $item)
        <div class="col-6 col-md-3">
            <div class="card text-center  quicktech-category-product-cart-border">
            <a href="{{route('product-details', $item->id)}}">
                <div class="text-center">
                    <img class="quicktech-product-table-img" src="{{asset($item->product_image)}}" alt="Card image cap">
                </div>
             
                <div class="card-body">
                    <h5 class="card-title quicktech-product-table-title text-capitalize">{{substr($item->product_name, 0, 30 )}}..</h5>
                    <h5 class="quicktech-product-table">${{$item->d_price}}<span><img src="{{asset('/')}}fontend-asset/image/prime.png" alt=""></span></h5>
                    </a>
                    <ul>
                        <i class='bx bxs-star'></i>

                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        
                    </ul>
                    <a href="{{route('add-cart', $item->id)}}" class="btn quicktech-product-table-button">Add To Cart</a>
                    <a href="{{route('product-details', $item->id)}}" class="btn quicktech-product-table-button2">Shop Now</a>
                </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>

    <script src="{{asset('/')}}fontend-asset/image-zoom.js" ></script>
        <!--Footer start--> 
  @endsection