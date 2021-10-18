@extends('layouts.admin.admin')
@section('admin')


    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Order info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Order No</th>
                        <td>{{ $orderInfos->id }}</td>
                    </tr>
                    <tr>
                        <th>Ordet Total </th>
                        <td>{{ $orderInfos->grand_total }}</td>
                    </tr>
                    <tr>
                        <th>Order Status </th>
                        <td>{{ $orderInfos->order_status }}</td>
                    </tr>
                    <tr>
                        <th>Payment Status </th>
                        <td>{{ $orderInfos->payment_status }}</td>
                    </tr>
                    <tr>
                        <th>Payment type </th>
                        <td>{{ $orderInfos->payment_type }}</td>
                    </tr>
                    <tr>
                        <th>Order Date </th>
                        <td>{{ $orderInfos->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Customer info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Customer Name </th>
                        <td>{{ $orderInfos->custromer_name->first_name }} {{ $orderInfos->custromer_name->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ $orderInfos->custromer_name->phone_number }} </td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{ $orderInfos->custromer_name->email_address }} </td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{ $orderInfos->custromer_name->address }} </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Shipping info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Full Name </th>
                        <td>{{ $orderInfos->shippinginfo->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{ $orderInfos->shippinginfo->phone_no }}</td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{ $orderInfos->shippinginfo->email_address }}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{ $orderInfos->shippinginfo->address }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="text-center">Product info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <thead class="thead-light">

                        <tr>
                            <th>SN.</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderedProducts as $orderedProduct)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $orderedProduct->product_id }}</td>
                                <td>{{ $orderedProduct->product_name }}</td>
                                <td>{{ $orderedProduct->product_price }}</td>
                                <td>{{ $orderedProduct->product_qty }}</td>
                                <td>{{ $orderedProduct->product_qty * $orderedProduct->product_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
