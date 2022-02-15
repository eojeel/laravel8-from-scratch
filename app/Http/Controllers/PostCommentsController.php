<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required|min:3'
        ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
