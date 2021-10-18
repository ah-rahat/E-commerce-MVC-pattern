@extends('layouts.admin.admin')
@section('admin')
    <div class="container">
        <div class="row">
            @if ($pro_id)
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            Edit Form
                        </div>
                        @if ($errors->all())
                            <div class="alert alert-info">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="card-body bg-info">
                            <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data"
                                class="form-group">
                                @csrf
                                @foreach ($productInfos as $productInfo)
                                    @if ($productInfo->id == $pro_id)
                                        <label for="">Edit Product Name</label>
                                        <input type="text" class="form-control" value="{{ $productInfo->name }}"
                                            name="product_name_update">
                                        <label class="control-label" for="">Edit Category Name</label>
                                        <select class="form-control" name="category_name_update" id="">
                                            <option selected value="{{ $productInfo->category_id }}">
                                                {{ $productInfo->category_name->category_name }}
                                            </option>
                                            @foreach ($categoryInfos as $categoryInfo)
                                                @if ($productInfo->category_name->category_name != $categoryInfo->category_name)
                                                    <option value="{{ $categoryInfo->id }}">
                                                        {{ $categoryInfo->category_name }}
                                                    </option>
                                                @endif

                                            @endforeach

                                            <input type="hidden" name="product_id" value="{{ $productInfo->id }}">
                                        </select>
                                        <label for="">Edit Product Price</label>
                                        <input type="text" value="{{ $productInfo->price }}" class="form-control"
                                            name="product_price_update">
                                        <label for="">Edit Product Information</label>
                                        <input type="text" value="{{ $productInfo->product_info }}" class="form-control"
                                            name="product_info_update">

                                        <label for="">Product Image</label>
                                        <br>
                                        <img width="150px" height="150px"
                                            src="{{ asset('uploads/productImage') }}/{{ $productInfo->product_image }}"
                                            alt="">
                                        <br>
                                        <input type="file" name="product_image_update">

                                        <button type="submit" class="btn btn-primary mt-1">Update</button>

                                    @endif
                                @endforeach

                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Product Form
                        </div>
                        @if ($errors->all())
                            <div class="alert alert-info">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                                class="form-group">
                                @csrf

                                <label for="">Product Name</label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}"
                                    name="product_name">
                                <label for="">Category Name</label>
                                <select class="form-control" name="category_name" id="">
                                    <option value="" disabled selected>Select..</option>
                                    @foreach ($categoryInfos as $categoryInfo)

                                        <option value="{{ $categoryInfo->id }}">{{ $categoryInfo->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                                <label for="">Product Price</label>
                                <input type="text" value="{{ old('product_price') }}" class="form-control"
                                    name="product_price">
                                <label for="">Product Information</label>
                                <input type="text" value="{{ old('product_info') }}" class="form-control"
                                    name="product_info">
                                <label for="">Publication Status</label>
                                <br>
                                <input type="radio" id="" name="product_status" value="1">
                                <label for="publish">publish</label><br>
                                <input type="radio" id="" name="product_status" value="0">
                                <label for="unpublish">unpublish</label><br>
                                <label for="">Product Image</label>
                                <input type="file" name="product_image">
                                <button type="submit" class="btn btn-primary mt-1">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Product Price</th>
                            <th>Product Information</th>
                            <th>Product Image</th>
                            <th>Publications Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($productInfos as $productInfo)
                            <tr>
                                <td>{{ $productInfo->name }}</td>
                                <td>{{ $productInfo->category_name->category_name }}</td>
                                <td>{{ $productInfo->price }}</td>
                                <td>{{ $productInfo->product_info }}</td>
                                <td>
                                    @if ($productInfo->product_status == 0)
                                        <a href="{{ route('product.status', ['pro_id' => $productInfo->id, 'pro_stats' => $productInfo->product_status]) }}"
                                            class="btn btn-danger btn-sm">Inactive</a>
                                    @else
                                        <a href="{{ route('product.status', ['pro_id' => $productInfo->id, 'pro_stats' => $productInfo->product_status]) }}"
                                            class="btn btn-success btn-sm">active</a>
                                    @endif

                                </td>
                                <td>
                                    <img width="50px" height="50px"
                                        src="{{ asset('uploads/productImage') }}/{{ $productInfo->product_image }}"
                                        alt="">
                                </td>
                                <td width=19%>
                                    <a href="{{ route('product.show', $productInfo->id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('product.delete', $productInfo->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
