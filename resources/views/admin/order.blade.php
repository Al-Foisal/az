@extends('admin.master')
@section('title', 'Order history')
@section('body')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Order Manage</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Order Manage Tables</a></li>
                                    <li class="breadcrumb-item active">Order Manage</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div id="customerList">
                                    <table id="table_id" class="display">
                                        <thead>
                                            <tr>
                                                <th class="sort text-center" data-sort="customer_name">Customer Name</th>
                                                <th class="sort text-center"> Tracking Code</th>
                                                <th class="sort text-center"> Payment Status</th>
                                                <th class="sort text-center"> Order Status</th>
                                                <th class="sort text-center"> Total</th>
                                                <th class="sort text-center"> Order Placed</th>
                                                <th class="sort " data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($orders))
                                                @foreach ($orders as $item)
                                                    <tr>
                                                        <td class="customer_name text-center">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            {{ $item->tracking_code }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            {{ $item->payment_status==1?'Paid':'Pending' }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            {{ $item->status }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            {{ $item->total_price }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            {{ $item->created_at->format("d-m-Y H:i:s A") }}
                                                        </td>
                                                        <td class="customer_name text-center">
                                                            Details
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h5 class="text-center">No category found.</h5>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>

    </div>
    <!-- end main content-->
    <!-- end main content-->

    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        })
    </script>

@endsection
