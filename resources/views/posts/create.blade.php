@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Post</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('posts.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter post title">

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="5" placeholder="Enter post content">{{ old('body') }}</textarea>

            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>



</div>
@endsection

