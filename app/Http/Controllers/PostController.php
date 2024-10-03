<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->paginate(10);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    Post::create([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
    return view('posts.edit', compact('post'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'body']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
    }




