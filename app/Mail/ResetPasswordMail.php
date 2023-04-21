<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Сброс пароля',
        );
    }

    public function content()
    {
        return new Content(
            view: 'reset-password-email',
            with: [ 'token' => $this->token]
        );
    }

    public function attachments()
    {
        return [];
    }
}
