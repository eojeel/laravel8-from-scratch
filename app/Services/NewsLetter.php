<?php

namespace App\Services;

interface NewsLetter
{
    public function subscribe(string $email, $list = null);
}
