<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

//Route::get('categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'categories' => Category::all(),
//        'currentCategory' => $category,
//        'posts' => $category->posts
//    ]);
//})->name('category');

//Route::get('authors/{author:username}', function (User $author) {
//    return view('posts.index', [
//        'posts' => $author->posts,
//        //'categories' => Category::all(),
//    ]);
//});

