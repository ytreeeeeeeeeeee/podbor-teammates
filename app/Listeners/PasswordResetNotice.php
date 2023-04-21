<?php

namespace App\Listeners;

use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\PasswordResetRequested;

class PasswordResetNotice
{
    public function __construct()
    {
        //
    }

    public function handle(PasswordResetRequested $event)
    {
        Mail::to($event->email)->send(new ResetPasswordMail($event->email, $event->token));
    }
}
