@extends('frontend.master')
@section('body')


<div class="container-fluid mt-5 mb-5">
       
       <div class="row">
       @foreach($category_product as $item)
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

@endsection