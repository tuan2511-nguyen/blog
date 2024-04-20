@extends('layouts.master')

@section('Title')
    User Management
@endsection

@section('content')
    <div class="container">
        <h1>Thông tin người dùng</h1>
        <table class="table">
            <tr>
                <th>Tên Trường</th>
                <th>Giá trị</th>
            </tr>
            <tr>
                <td>ID</td>
                <td> {{ $user['id'] }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td> {{ $user['name'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td> {{ $user['email'] }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td> {{ $user['password'] }}</td>
            </tr>
        </table>
    </div>
@endsection
