@extends('layouts.frontend.frontend')
@section('frontend')

    <!-- Page Title area start -->
    <div class="page-tile-area py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area start -->

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Resister, if you are not Register betore!
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" class="form-control" type="text" name="first_name" value=""
                                    placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" class="form-control" type="text" name="last_name" value=""
                                    placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">

                                <label for="email_address">Email Address</label>
                                @if (session('email'))
                                    <div class="alert alert-danger">
                                        {{ session('email') }}
                                    </div>
                                @endif
                                <input id="email_address" class="form-control" type="text" name="email_address" value=""
                                    placeholder="Enter Your Email">
                                <span class="text-danger error_msg" style="margin-top: 3px;font-size: 15px;"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone_number"> Phone Number</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number" value=""
                                    placeholder="Enter Your Phone Number">
                                <span class="text-danger phn_error_msg" style="margin-top: 3px;font-size: 15px;"></span>

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" value=""
                                    placeholder="Enter Your Password">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2"
                                    placeholder="Enter Your full address "></textarea>
                            </div>
                            <input class="btn btn-success btn-lg btn-block" type="submit" value="Resister">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">


                <div class="card">
                    <div class="card-header">
                        Already Registered? Login here!
                        @if (session('login_faild'))
                            <div class="alert alert-info">
                                {{ session('login_faild') }}
                            </div>
                        @endif
                        @if (session('password_faild'))
                            <div class="alert alert-info">
                                {{ session('password_faild') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input id="" class="form-control" type="text" name="email_address" value=""
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="" class="form-control" type="password" name="password" value=""
                                    placeholder="Enter Your Password">
                            </div>

                            <input class="btn btn-success btn-lg btn-block" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $('#email_address').on('change', function() {
            var email_address = $(this).val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: 'GET',
                url: '{{ route('email.check') }}',
                data: {
                    _token: CSRF_TOKEN,
                    email_address: email_address,
                },
                beforeSend: function() {
                    $('.error_msg').html(
                        '<i class="fas fa-circle-notch fa-spin" style="font-size: 16px;margin-top: 3px;"></i>'
                    );
                },
                success: function(data) {
                    $('.error_msg').html(data);
                }
            })
        });
    </script>
    <script type="text/javascript">
        $('#phone_number').on('change', function() {
            var phone_number = $(this).val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: 'GET',
                url: '{{ route('phone.check') }}',
                data: {
                    _token: CSRF_TOKEN,
                    phone_number: phone_number,
                },
                beforeSend: function() {
                    $('.phn_error_msg').html(
                        '<i class="fas fa-circle-notch fa-spin" style="font-size: 16px;margin-top: 3px;"></i>'
                    );
                },
                success: function(data) {
                    $('.phn_error_msg').html(data);
                }
            })
        });
    </script>
@endsection
