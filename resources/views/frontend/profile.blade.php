@extends('frontend.master')
@section('body')
    @php
        use Illuminate\Support\Facades\Session;
        use App\Models\Customer;
        $customer = Customer::where('id', Session::get('customer_id'))->first();
    @endphp

    <div class="row gutters-sm mt-5 p-5">
        <div class="col-md-4 mb-3 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            @if (!empty($customer->name))
                                <h4>{{ $customer->name }}</h4>
                            @endif

                            <a href="{{ route('customer-logout') }}" class="btn btn-primary">Logout</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (!empty($customer->name))
                                {{ $customer->name }}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (!empty($customer->email))
                                {{ $customer->email }}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (!empty($customer->phone))
                                {{ $customer->phone }}
                            @endif
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (!empty($customer->address))
                                {{ $customer->address }}
                            @endif
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <div class="row ">
      <div class="col-12 mb-3 p-5">
          <h4><u>Order History</u>:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Tracking Code</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->tracking_code }}</td>
                            <td>{{ $order->payment_status == 1 ? 'Paid' : 'Pending' }}</td>
                            <td>{{ $order->status }}</td>
                            <td>${{ $order->total_price }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>

    </div>
    </div>
@endsection
