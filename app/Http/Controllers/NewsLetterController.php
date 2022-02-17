<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsLetterController extends Controller
{

    public function __invoke(NewsLetter $newsLetter)
    {
        request()->validate([
            'email' => 'required|email',
        ]);

        try {
            $newsLetter->subscribe(request('email'));
        } catch (\Exception $e) {
            \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['The emil could not be added to our newsletter list'],
            ]);
        }
        return redirect('/')->with('message', 'Thanks for subscribing!');
    }
}
