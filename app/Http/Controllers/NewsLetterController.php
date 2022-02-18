<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Http\Request;
use Exception;

class NewsLetterController extends Controller
{
    public function __invoke(NewsLetter $newsletter)
    {
        ddd($newsletter);
        request()->validate([
            'email' => 'required|email',
        ]);

        try {
            $newsletter>subscribe(request('email'));
        } catch (\Exception $e) {
            \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['The emil could not be added to our newsletter list'],
            ]);
        }
        return redirect('/')->with('message', 'Thanks for subscribing!');
    }
}
