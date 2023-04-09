<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class RequestDecisionNotification extends Notification
{
    use Queueable;

    public $accept;
    public $teammate_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($accept, $teammate_id)
    {
        $this->accept = $accept;
        $this->teammate_id = $teammate_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'decision' => $this->accept,
            'name' => Auth::user()->name,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('decision-online.' . $this->teammate_id);
    }
}
