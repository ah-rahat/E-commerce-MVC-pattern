@extends('layouts.admin.admin')
@section('admin')

    <div class="card">
        <div class="card-header">
            Catrgory Form

        </div>

        <div class="card-body">
            <div class="row">
                @if ($cat_id)





                    <div class="col-md-4">
                        <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data"
                            class="form-group">
                            @csrf
                            @foreach ($categoryInfos as $categoryInfo)
                                @if ($categoryInfo->id == $cat_id)
                                    <input type="hidden" name="catId" value="{{ $categoryInfo->id }}">
                                    <label for="">Edit Category Name:</label>
                                    <input type="text" class="form-control" value="{{ $categoryInfo->category_name }}"
                                        name="edit_category">
                                    <label for="">Edit Category description:</label>
                                    <input type="text" class="form-control"
                                        value="{{ $categoryInfo->category_description }}" name="edit_description">
                                    <button type="submit" class="btn btn-primary mt-1">update</button>
                                @endif
                            @endforeach
                        </form>
                    </div>
                @else
                    <div class="col-md-4">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"
                            class="form-group">
                            @csrf
                            <label for="">Category Name:</label>
                            <input type="text" class="form-control" name="category">
                            <label for="">Category description:</label>
                            <input type="text" class="form-control" name="description">
                            <button type="submit" class="btn btn-primary mt-1">Save</button>

                        </form>
                    </div>
                @endif


                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($categoryInfos as $categoryInfo)
                                <tr>
                                    <td>{{ $categoryInfo->category_name }}</td>
                                    <td>{{ $categoryInfo->category_description }}</td>
                                    <td>
                                        @if ($categoryInfo->category_status == 0)
                                            <a href="{{ route('category.status', ['cat_id' => $categoryInfo->id, 'cat_stats' => $categoryInfo->category_status]) }}"
                                                class="btn btn-danger">Inactive</a>
                                        @else
                                            <a href="{{ route('category.status', ['cat_id' => $categoryInfo->id, 'cat_stats' => $categoryInfo->category_status]) }}"
                                                class="btn btn-success">active</a>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('category.show', $categoryInfo->id) }}"
                                            class="btn btn-info">Edit</a>
                                        <a href="{{ route('category.delete', $categoryInfo->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
