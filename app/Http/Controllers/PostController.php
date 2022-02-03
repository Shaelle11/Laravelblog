<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index',
            [
                'posts' => Post::all()->map(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'body' => $post->body,
                        'image' => asset('storage/' . $post->image),
                        'created_at' => $post->created_at,

                    ];
                }),
            ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store()
    {
        $image = Request::file('image')->store('posts', 'public');
        Post::create([
            'title' => Request::input('title'),
            'body' => Request::input('body'),
            'image' => $image,

        ]);
        return Redirect::route('posts.index');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post,
            'image' => asset('storage/' . $post->image),
        ]);
    }

    public function update(Post $post)
    {
        $image = $post->image;
        if (Request::file('image')) {
            Storage::delete('public/' . $post->image);
            $image = Request::file('image')->store('posts', 'public');
        }
        $post->update([
            'title' => Request::input('title'),
            'body' => Request::input('body'),
            'image' => $image,
        ]);
        return Redirect::route('posts.index');
    }

    public function destroy(Post $post)
    {
        Storage::delete('public/' . $post->image);
        $post->delete();
        return Redirect::route('posts.index');
    }
}
