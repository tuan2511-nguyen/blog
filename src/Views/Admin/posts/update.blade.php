@extends('layouts.master')

@section('Title')
    Post Management
@endsection

@section('content')
    <div style="padding: 20px">
        <h1 class="h3 mb-2 text-gray-800">Post</h1>
        <p class="mb-4" style="color: red">Update Post</p>
        <div class="card shadow mb-4">
            <form action="" method="POST" enctype="multipart/form-data" style="padding: 20px">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Category:</label>
                    <select name="category_id" id="" class="form-select" required>
                        <option value="" selected>--------Chọn--------</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" @if ($category['id'] == $post['category_id']) selected @endif>
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="name" name="title" required
                        value=" {{ $post['title'] }} ">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Excerpt:</label>
                    <input type="text" class="form-control" id="email" name="excerpt" required
                        value=" {{ $post['excerpt'] }} ">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="6" required>{{ $post['content'] }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="avatar" name="image">
                    <img src="{{ $post['image'] }} " width="100px" alt="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
