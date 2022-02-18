<?php

namespace App\Services;

class ConvertKitNewsLetter implements Newsletter
{
    // protected php 8.0
    public function __construct()
    {
        //
    }

    public function subscribe(string $email, $list = null)
    {
        // subscribe users with convertkit api calls
    }
}
