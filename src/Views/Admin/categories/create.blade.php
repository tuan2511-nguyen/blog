@extends('layouts.master')

@section('Title')
    Category Management
@endsection

@section('content')
    <div style="padding: 20px">
        <h1 class="h3 mb-2 text-gray-800">Category</h1>
        <p class="mb-4" style="color: red">Thêm Category</p>
        <form action="" method="POST">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" required placeholder="Enter name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
