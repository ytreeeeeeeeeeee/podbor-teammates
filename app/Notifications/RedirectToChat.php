<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class RedirectToChat extends Notification
{
    use Queueable;

    public $teammate_id;
    public $user_id;

    public function __construct($teammate_id, $user_id)
    {
        $this->teammate_id = $teammate_id;
        $this->user_id = $user_id;
    }

    public function via($notifiable)
    {
        return ['broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'url' => '/add-chat/' . $this->user_id,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('redirect.' . $this->teammate_id);
    }
}
