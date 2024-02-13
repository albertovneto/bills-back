<?php

namespace App\Adapters;

use App\Adapters\Contracts\MailAdapterContract;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailAdapter implements MailAdapterContract
{
    public function send(string $email, Mailable $mailView)
    {
        return Mail::to($email)->send($mailView);
    }
}
