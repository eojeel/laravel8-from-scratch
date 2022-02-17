<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

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

Route::post('newsletter', function () {
    request()->validate([
        'email' => 'required|email',
    ]);

    return redirect('/')->with('message', 'Thanks for subscribing!');

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'uk1'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('tdfsfsdfsd', [
            'email_address' => request('email'),
            'status' => 'subscribed',
            'merge_fields' => [
                'FNAME' => 'John',
                'LNAME' => 'Doe',
            ],
        ]);
    } catch (\Exception $e) {
        \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['The emil could not be added to our newsletter list'],
        ]);
    }

    return redirect('/')->with('message', 'Thanks for subscribing!');
});
