@extends('layouts.admin.admin')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-bordered ">
                    <thead class="thead-light">
                        <tr>
                            <th>SN.</th>
                            <th>Customer Name </th>
                            <th>Total Price</th>
                            <th>Order Date </th>
                            <th>Payment Type </th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderInfos as $orderInfo)
                            <tr>
                                <td>{{ $orderInfo->id }}</td>
                                <td>{{ $orderInfo->custromer_name->first_name . ' ' . $orderInfo->custromer_name->last_name }}
                                </td>
                                <td>{{ $orderInfo->grand_total }}</td>
                                <td>{{ $orderInfo->created_at }}</td>
                                <td>{{ $orderInfo->payment_type }}</td>
                                <td>{{ $orderInfo->payment_status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-info" href="{{ route('order.details', $orderInfo->id) }}"
                                            title="view Order details"><i class="fas fa-info"></i></a>
                                        <a class="btn btn-success" href="{{ route('order.invoice', $orderInfo->id) }}"
                                            title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                        <a class="btn btn-primary" href="{{ route('invoice.download', $orderInfo->id) }}"
                                            title="Order Invoice Download"><i class="fas fa-file-download"></i></a>
                                        <a class="btn btn-danger" href="" title=" Order Delete"><i
                                                class="fas fa-trash-alt"></i></a>
                                        <a class="btn btn-warning" href="" title=" Order Edit"><i
                                                class="far fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
