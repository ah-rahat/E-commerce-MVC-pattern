<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>invoice order receipt - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- BEGIN INVOICE -->
            <div class="col-xs-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-xs-12">
                                    {{-- <img src="http://vergo-kertas.herokuapp.com/assets/img/logo.png" alt="" height="35"> --}}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>invoice<br>
                                        <span class="small">order #{{ $orderInfos->id }}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    Twitter, Inc.<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    {{ $orderInfos->shippinginfo->full_name }}<br>
                                    {{ $orderInfos->shippinginfo->address }}<br>
                                    <abbr title="Phone">P:</abbr> {{ $orderInfos->shippinginfo->phone_no }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    {{ $orderInfos->payment_type }}<br>
                                    {{ $orderInfos->custromer_name->email_address }}<br>
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{ $orderInfos->created_at }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>ORDER SUMMARY</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="line">
                                            <th>SN.</th>

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

                                                <td>{{ $orderedProduct->product_name }}</td>
                                                <td>{{ $orderedProduct->product_price }}</td>
                                                <td>{{ $orderedProduct->product_qty }}</td>
                                                <td>{{ $orderedProduct->product_qty * $orderedProduct->product_price }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                Grand-Total:<br>{{ $orderInfos->grand_total }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
            background: #eee;
        }

        .invoice {
            padding: 30px;
        }

        .invoice h2 {
            margin-top: 0px;
            line-height: 0.8em;
        }

        .invoice .small {
            font-weight: 300;
        }

        .invoice hr {
            margin-top: 10px;
            border-color: #ddd;
        }

        .invoice .table tr.line {
            border-bottom: 1px solid #ccc;
        }

        .invoice .table td {
            border: none;
        }

        .invoice .identity {
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: 300;
        }

        .invoice .identity strong {
            font-weight: 600;
        }


        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }

    </style>

    <script type="text/javascript">

    </script>
</body>

</html>
