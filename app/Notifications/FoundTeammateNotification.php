<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class FoundTeammateNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    public $user_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'teammate' => Auth::user(),
        ]);
    }
//    public function toArray($notifiable)
//    {
//        return [
//            'teammate' => Auth::user(),
//        ];
//    }

//    public function broadcastOn()
//    {
//        return new PrivateChannel('notifications.' . $this->user_id);
//    }
}
