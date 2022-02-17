<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;


class NewsLetter
{
    public function subscribe(string $email, $list = null)
    {

        $list ?? config('services.mailchimp.lists.subscribers');

        $response = $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'Subscribed'
        ]);
    }

    public function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'uk1'
        ]);
    }
}
