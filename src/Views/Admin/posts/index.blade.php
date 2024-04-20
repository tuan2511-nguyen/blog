@extends('layouts.master')

@section('Title')
    Post Management
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Posts</h1>
        <p class="mb-4">Quản lý Posts</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/admin/posts/create" class="btn btn-info">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post['id'] }}</td>
                                    <td>{{ $post['category_name'] }}</td>
                                    <td>{{ $post['title'] }}</td>
                                    <td>{{ $post['excerpt'] }}</td>
                                    <td>
                                        <img src="{{ $post['image'] }} " width="100px" alt="">
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="/admin/posts/{{ $post['id'] }}/update">Update</a>
                                        <a class="btn btn-info" href="/admin/posts/{{ $post['id'] }}/show">Show</a>
                                        <a class="btn btn-danger" onclick="return confirm('Có chắc muốn xóa không') "
                                            href="/admin/posts/{{ $post['id'] }}/delete">Delete</a>
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
