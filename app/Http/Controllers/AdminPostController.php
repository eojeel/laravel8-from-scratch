<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store()
    {
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thunbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        $attributes['user_id'] = auth()->id();
        if (isset($attributes['thumbnail'])) {
            $attributes['thunbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return  back()->with('success', 'Post updated successfully');
    }

    public function validatePost(Post $post = null): array
    {
        $post ??= new Post();

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'body' => ['required', 'min:3'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required', 'min:3'],
            'category' => ['required', 'min:3', Rule::exists('category', 'id')],
        ]);

        return $attributes;
    }

    public function destory(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted successfully');
    }
}
