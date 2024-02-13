<?php

namespace App\Adapters\Contracts;

use Illuminate\Contracts\Mail\Mailable;

interface MailAdapterContract
{
    public function send(string $email, Mailable $mailView);
}
