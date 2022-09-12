@extends('frontend.master')
@section('body')
    <?php
    
    use Illuminate\Support\Facades\Session;
    
    $sum = 0;
    $qnty = 0;
    $qnty1 = 0;
    $sum1 = 0;
    ?>
    <link rel="stylesheet" href="{{ asset('/') }}fontend-asset/billing.css">
    <nav class="bg-white">
        <div class="d-flex align-items-center">

        </div>
    </nav>
    <header>
        <div class="d-flex justify-content-center align-items-center pb-3">
            <div class="px-sm-5 px-2">SHOPPING CART</div>
            <div class="px-sm-5 px-2 active">CHECKOUT <span class="fas fa-check"></span> </div>
            <div class="px-sm-5 px-2">FINISH</div>
        </div>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </header>
    <div class="wrapper">
        <div class="h5 large">Billing Address</div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
                <div class="mobile h5">Billing Address</div>
                <div id="details" class="bg-white rounded pb-5">
                    <form action="{{ route('orderSave') }}" method="post">
                        @csrf
                    <input type="hidden" name="customer_id" value="{{ Session::get('customer_id') }}" id="customer_id">
                    <div class="form-group"> <label class="text-muted">Name</label> <input type="text"
                            value="{{ $customer->name }}" class="form-control" name="name" id="name"> </div>
                    <div class="form-group"> <label class="text-muted">Email</label>
                        <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="email"
                                value="{{ $customer->email }}" name="email" id="email"> <span
                                class="fas fa-check text-success pr-sm-2 pr-0"></span> </div>
                    </div>
                    <div class="form-group"> <label class="text-muted">Phone</label> <input type="text"
                            value="{{ $customer->phone }}" class="form-control" name="phone" id="phone"> </div>
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group"> <label>Address</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2"> <input
                                        type="text" value="{{ $customer->address }}" name="address" id="address"> <span
                                        class="fas fa-check text-success pr-2"></span> </div>
                            </div>
                        </div>

                    </div> <label>Country</label> <select name="country" id="country">
                        <option value="usa">USA</option>
                        <option value="india">INDIA</option>
                    </select>

                    <div class="mt-5">
                            <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
                <div id="cart" class="bg-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h6">Cart Summary</div>
                        <div class="h6"> <a href="{{ url('cart-products') }}">Edit</a> </div>
                    </div>
                    @foreach ($cartproducts as $item)
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                            <div class="item pr-2"> <img src="{{ asset($item->options->image) }}" alt=""
                                    width="80" height="80">
                                <div class="number">{{ $item->qty }}</div>
                            </div>
                            <div class="d-flex flex-column px-3"> <b class="h5"> {{ substr($item->name, 0, 30) }}..
                            </div>
                            <div class="ml-auto"> <b class="h5">${{ $item->price * $item->qty }}</b> </div>
                        </div>
                        <?php $sum = $sum + $item->qty * $item->price;
                        Session::put('sub_total', $sum);
                        $qnty = $qnty + $item->qty;
                        Session::put('product_no', $qnty);
                        ?>
                    @endforeach
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="display-5">Subtotal</div>
                        <div class="ml-auto font-weight-bold">${{ $sum }}</div>
                    </div>
                    <div class="d-flex align-items-center py-2 border-bottom">
                        <div class="display-5">Shipping</div>
                        @if (!empty($setting->delivery_charge))
                            <div class="ml-auto font-weight-bold">${{ $setting->delivery_charge }}</div>
                    </div>
                    @endif
                    <div class="d-flex align-items-center py-2">
                        <div class="display-5">Total</div>
                        <div class="ml-auto d-flex">
                            <div class="text-primary text-uppercase px-3">usd</div>
                            @if (!empty($setting->delivery_charge))
                                <div class="font-weight-bold">{{ $sum + $setting->delivery_charge }}</div>
                            @else
                                <div class="font-weight-bold">${{ $sum }}</div>
                            @endif

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
