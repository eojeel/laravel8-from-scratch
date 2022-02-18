<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailChimpNewsLetter implements Newsletter
{
    // protected php 8.0
    public function __construct(protected ApiClient $client)
    {
    //
    }

    public function subscribe(string $email, $list = null)
    {

        $list ?? config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'Subscribed'
        ]);
    }
}
