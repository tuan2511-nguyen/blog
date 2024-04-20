@extends('layouts.master')

@section('Title')
    Category Management
@endsection

@section('content')
    <div class="container">
        <h1>Thông tin category</h1>
        <table class="table">
            <tr>
                <th>Tên Trường</th>
                <th>Giá trị</th>
            </tr>
            <tr>
                <td>ID</td>
                <td> {{ $category['id'] }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td> {{ $category['name'] }}</td>
            </tr>
        </table>
    </div>
@endsection
