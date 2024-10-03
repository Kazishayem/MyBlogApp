
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
    </div>
@endsection
