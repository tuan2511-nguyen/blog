@extends('layouts.master')

@section('Title')
    User Management
@endsection

@section('content')
    <div style="padding: 20px">
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4" style="color: red">Update người dùng</p>
        <form action="" method="POST">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" class="form-control" id="name" required placeholder="Nhập tên" name="name"
                    value="{{ $user['name'] }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" required placeholder="Nhập email" name="email"
                    value="{{ $user['email'] }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" required placeholder="Nhập mật khẩu"
                    name="password" value="{{ $user['password'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
