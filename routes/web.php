<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // LOGGING SQL
    /*
    DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });

    clockwork app and dev tools.
    */


    return view('posts', [
        'categories' => Category::all(),
        'posts' => Post::latest('created_at')->get()
    ]);
});


Route::get('post/{post}', function (Post $post) {
    // Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'categories' => Category::all(),
        'currentCategory' => $category,
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
});

