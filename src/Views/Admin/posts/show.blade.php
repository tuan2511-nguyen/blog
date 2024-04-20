@extends('layouts.master')

@section('Title')
    Post Management
@endsection

@section('content')
    <div class="container">
        <h1>Thông tin Post</h1>
        <table class="table">
            <tr>
                <th>Tên Trường</th>
                <th>Giá trị</th>
            </tr>
            <tr>
                <td>ID</td>
                <td> {{ $post['id'] }}</td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td> {{ $post['category_name'] }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td> {{ $post['title'] }}</td>
            </tr>
            <tr>
                <td>Excerpt</td>
                <td> {{ $post['excerpt'] }}</td>
            </tr>
            <tr>
                <td>Content</td>
                <td> {{ $post['content'] }}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="{{ $post['image'] }} " width="100px" alt=""></td>
            </tr>
        </table>
    </div>
@endsection
