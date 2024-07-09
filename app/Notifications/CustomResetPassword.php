<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'emails.resetMdp', ['url' => url(config('app.url').route('password.reset', $this->token, false))]
        );
    }
}
