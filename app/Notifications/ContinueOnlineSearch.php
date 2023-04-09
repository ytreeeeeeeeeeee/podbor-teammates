<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContinueOnlineSearch extends Notification
{
    use Queueable;

    public $teammate_id;
    public $user_id;
    public $owner;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($teammate_id, $user_id, $owner)
    {
        $this->teammate_id = $teammate_id;
        $this->user_id = $user_id;
        $this->owner = $owner;
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
            'exception' => $this->user_id,
            'owner' => $this->owner,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('continue.' . $this->teammate_id);
    }
}
