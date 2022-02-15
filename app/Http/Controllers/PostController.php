<?php

namespace App\Http\Controllers;

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

        return view('posts.index', [
            //'categories' => Category::all(),
            //'currentCategory' => Category::firstWhere('slug', request('cateogry')),
            //'posts' => $this->getPost(),
            'posts' => Post::latest()->filter(
                request(['search','category','author'])
                )->simplePaginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
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
