<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destory'])->middleware('auth');

Route::post('newsletter', NewsLetterController::class);

//Admin
Route::get('admin/post/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/post', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/post', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/post/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/post/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/post/{post}', [AdminPostController::class, 'destory'])->middleware('admin');
