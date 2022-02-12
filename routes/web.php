<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destory'])->middleware('auth');

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

