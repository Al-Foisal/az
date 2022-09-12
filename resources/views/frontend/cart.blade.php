@extends('frontend.master')
@section('body')
<?php

use Illuminate\Support\Facades\Session;

$sum = 0;
$qnty = 0;
$qnty1 = 0;
$sum1=0;
?>
<link rel="stylesheet" href="{{asset('/')}}fontend-asset/cartpage.css">
<div class="container-fluid mt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart"style="overflow=:auto">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col" class="text-center">Product Image</th>
                                    <th scope="col" class="text-center">Product Name</th>
                                    <th scope="col"  class="text-center">Price</th>
                                    <th scope="col" class="text-center" >Quantity</th>
                                    <th scope="col" class="text-center" >Total</th>
                                    <th scope="col" class="text-center"  >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartproducts as $item)
                                <tr>
                               
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{asset($item->options->image)}}" class="img-sm"></div>
                                            <figcaption class="info">
                                                <p class="">Size: {{$item->options->size}}<br> Color: <span style="width: 13px;margin-left: 5px; height: 13px; background:{{$item->options->color}}; border-radius: 4px;display: inline-block;"></span></p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                 
                                    <td class="text-center h6" style="font-family: fangsong;"> {{substr($item->name, 0, 80 )}}..</td>

                               
                                    <td>
                                        <div  class="text-center h6"> <var class="price">${{$item->price }}</var>  </div></td>
                                  <form action="{{route('cart-update')}}" method="post">
                                  <td class="text-center"> <input style="width: 50%;text-align: center;" type="number" name="qty" value="{{$item->qty}}" min="1" max="{{$item->options->product_qty}}"> </td>
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                    
                                    </td>
                                    <td   class="text-center h6"><var class="price">${{$item->price * $item->qty}}</var> </td>
                                    <td class="text-right d-md-block">  <button type="submit"  class="btn btn-light " style="background: #47c3f3;"> Update</button> 
                                    </form>
                                    <form action="{{route('remove-cart')}}" method="post" style="display: inline-block;">
                                        @csrf
                                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                     <button type="submit" hf=""  class="btn btn-light" data-abc="true"> Remove</button> </td>
                                     </form>
                                </tr>
                                <?php $sum = $sum + ($item->qty * $item->price);
                                    Session::put('sub_total', $sum);
                                    $qnty = $qnty + $item->qty;
                                    Session::put('product_no', $qnty);
                                ?>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="row">
                @foreach($Products as $item)
                
                <div class="col-12 col-md-12">
                    <div class="card text-center  quicktech-category-product-cart-border">
                        <a href="{{route('product-details', $item->id)}}">
                            <div class="text-left">
                                <img class="quicktech-product-cart"style="width: 80px; height: 80px;" src="{{asset($item->product_image)}}" alt="Card image cap">
                                <h5 style="display: inline-block; color: #000;font-family: fangsong;">{{substr($item->product_name, 0, 50 )}}...<br><small style="color: #ef6c00;font-family: fangsong;">${{$item->d_price}}</small></h5>
                            </div>
                        </a>
                   </div>
                </div>
                @if($loop->iteration == Session::get('product_no'))
                @break
                @endif
                @endforeach
                </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="dlist-align">
                            <h5 class="text-dark" style="font-size: 20px;font-family: fantasy; color: ##000 !important;">Sub Total:
                           <h5><span style="font-size: 20px;font-family: fantasy; color: #f28a21 !important;"> ${{$sum}}</span>
                        </div>
                        <div class="dlist-align">
                            <h5 style="font-size: 20px;font-family: fantasy; color: ##000 !important;">Delivery charge:</h5>
                            @if(!empty($setting->delivery_charge))
                            <span style="font-size: 20px;font-family: fantasy; color: #f28a21 !important;">${{ $setting->delivery_charge}}</span>
                            @endif
                        </div>
                        <div class="dlist-align">
                            <h5 style="font-size: 20px;font-family: fantasy; color: ##000 !important;" >Total:
                            @if(!empty($setting->delivery_charge))</h5>
                           <span style="font-size: 20px;font-family: fantasy; color: #f28a21 !important;">${{$sum + $setting->delivery_charge}}</span>
                           
                            @else
                            <h5 class="text-right  ml-3" style="font-size: 20px;font-family: fantasy; color: #f28a21 !important;">${{$sum }}</h5>
                            @endif
                           
                       </div>
                        <style>
                            .btn-1111:hover{
                                color:#47c3f3

                            }
                        </style>
                        <hr> <a href="{{route('billing')}}" class="btn btn-out  btn-rounded btn-main btn-1111" style="background: #FFA502;" data-abc="true"> Proceded to Checkout </a> 
                        <a href="{{route('/')}}" class="btn btn-out  btn-rounded btn-main mt-2 btn-1111" style="background: #FFA502;"  data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

  
@endsection