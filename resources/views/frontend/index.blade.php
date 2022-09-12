@extends('frontend.master')
@section('body')
    @php
        use App\Models\Product;
    @endphp


    <!--category product -->

    <div class="container-fluid mt-5 mb-5 ">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach ($category as $item)
                <div class="col-12 col-md-3">
                    <a href="{{ route('category-products', $item->id) }}">
                        <h1 class="quicktech-catagory-product-header " style="color:#000">{{ $item->category_name }}</h1>

                    </a>
                    <div class="row">
                        @php
                            $products = Product::where('category_id', $item->id)->paginate(4);
                        @endphp
                        @foreach ($products as $product)
                            <a href="{{ route('product-details', $product->id) }}">
                                <div class="col-6 quicktech-category-product-cart-padding">
                                    <div class="card  quicktech-category-product-cart-border" style="width:100%">
                                        <div class="text-center">
                                            <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                                alt="...">
                                        </div>

                                        <div class="card-body text-center">
                                            <a href="{{ route('product-details', $product->id) }}"
                                                class="btn quicktech-category-product-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    </span> <img src="{{ asset('/') }}fontend-asset/image/prime.png" alt="">
                </div>
            @endforeach

        </div>
    </div>
    <!--category product -->
    <div class="container-fluid mb-5">
        <h1 class="quicktech-hading"> Best Seller </h1>
        <hr>
        <div class="row">
            @foreach ($best_sellar as $item)
                <div class="col-6 col-md-3">
                    <div class="card text-center  quicktech-category-product-cart-border">
                        <a href="{{ route('product-details', $item->id) }}">
                            <div class="text-center">
                                <img class="quicktech-product-table-img" src="{{ asset($item->product_image) }}"
                                    alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title quicktech-product-table-title text-capitalize">
                                    {{ substr($item->product_name, 0, 30) }}..</h5>
                                <h5 class="quicktech-product-table">${{ $item->d_price }}<span><img
                                            src="{{ asset('/') }}fontend-asset/image/prime.png" alt=""></span>
                                </h5>
                        </a>
                        <ul>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                        </ul>
                        <a href="{{ route('add-cart', $item->id) }}" class="btn quicktech-product-table-button">Add To
                            Cart</a>
                        <a href="{{ route('product-details', $item->id) }}"
                            class="btn quicktech-product-table-button2">Shop Now</a>
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

            @foreach ($new_collection as $item)
                <div class="col-6 col-md-3">
                    <div class="card text-center  quicktech-category-product-cart-border">
                        <a href="{{ route('product-details', $item->id) }}">
                            <div class="text-center">
                                <img class="quicktech-product-table-img" src="{{ asset($item->product_image) }}"
                                    alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title quicktech-product-table-title text-capitalize">
                                    {{ substr($item->product_name, 0, 30) }}..</h5>
                                <h5 class="quicktech-product-table">${{ $item->d_price }}<span><img
                                            src="{{ asset('/') }}fontend-asset/image/prime.png" alt=""></span>
                                </h5>
                        </a>
                        <ul>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                        </ul>
                        <a href="{{ route('add-cart', $item->id) }}" class="btn quicktech-product-table-button">Add To
                            Cart</a>
                        <a href="{{ route('product-details', $item->id) }}"
                            class="btn quicktech-product-table-button2">Shop Now</a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
    <div class="container-fluid mb-5">
        <h1 class="quicktech-hading"> Low Price</h1>
        <hr>
        <div class="row">

            @foreach ($low_price as $item)
                <div class="col-6 col-md-3">
                    <div class="card text-center  quicktech-category-product-cart-border">
                        <a href="{{ route('product-details', $item->id) }}">
                            <div class="text-center">
                                <img class="quicktech-product-table-img" src="{{ asset($item->product_image) }}"
                                    alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title quicktech-product-table-title text-capitalize">
                                    {{ substr($item->product_name, 0, 30) }}..</h5>
                                <h5 class="quicktech-product-table">${{ $item->d_price }}<span><img
                                            src="{{ asset('/') }}fontend-asset/image/prime.png" alt=""></span>
                                </h5>
                        </a>
                        <ul>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>

                        </ul>
                        <a href="{{ route('add-cart', $item->id) }}" class="btn quicktech-product-table-button">Add To
                            Cart</a>
                        <a href="{{ route('product-details', $item->id) }}"
                            class="btn quicktech-product-table-button2">Shop Now</a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
