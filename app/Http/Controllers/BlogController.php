<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class BlogController extends Controller
{

    public function index()
    {
        return Inertia::render('Pages/Welcome', [
            "blogs" => Post::all()->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'body' => $blog->body,
                    'image' => asset('storage/' . $blog->image),
                    'created_at' => $blog->created_at,

                ];
            })->paginate(10),
        ]);
    }
    public function create()
    {
        return Inertia::render('Posts/Create');
    }
    public function store(Request $request)
    {
        $image = Request::file('image')->store('blogs', 'public');
        Post::create([
            'title' => Request::input('title'),
            'body' => Request::input('body'),
            'image' => $image,

        ]);
        return Redirect::route('pages.welcome');
    }
}
