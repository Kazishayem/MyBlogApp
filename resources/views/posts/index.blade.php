@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Blog Posts</h2>


    @if($posts->count() > 0)

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">

                    <h3 class="card-title">
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h3>


                    <p class="card-text">{{ Str::limit($post->body, 100) }}</p>


                    <small class="text-muted">
                        By {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}
                    </small>


                    @if(Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->role == 'admin'))
                        <div class="mt-2">

                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>


                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach


        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

    @else

        <p>No posts available. Be the first to <a href="{{ route('posts.create') }}">create a new post</a>!</p>
    @endif
</div>
@endsection
