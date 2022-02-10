<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // LOGGING SQL
        /*
        DB::listen(function ($query){
            logger($query->sql, $query->bindings);
        });

        clockwork app and dev tools.
        */

        return view('posts', [
            'categories' => Category::all(),
            //'posts' => $this->getPost(),
            'posts' => Post::latest()->filter(request(['search']))->get()
        ]);
    }

    public function show(Post $post)
    {
        // Find a post by its slug and pass it to a view called "post"
        return view('post', [
            'post' => $post
        ]);
    }

    public function getPost ()
    {
        return Post::latest()->filter()->get();
        /*
        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%'. request('search') .'%')
            ->orWhere('body', 'like', '%'. request('search') .'%');
        }

        return $posts->get();
        */

    }
}
