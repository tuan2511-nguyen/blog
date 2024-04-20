@extends('layouts.master')

@section('Title')
    Category Management
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <p class="mb-4">Quản lý Categories</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/admin/categories/create" class="btn btn-info">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Chức năng</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $category['id'] }} </td>
                                    <td> {{ $category['name'] }} </td>
                                    <td>
                                        <a href="/admin/categories/{{ $category['id'] }}/update"
                                            class="btn btn-info">Update</a>
                                        <a href="/admin/categories/{{ $category['id'] }}/show" class="btn btn-info">Show</a>
                                        <a href="/admin/categories/{{ $category['id'] }}/delete" class="btn btn-info"
                                            onclick="return confirm('Xóa đi không phải nghĩ!!!')">Delete</a>
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
