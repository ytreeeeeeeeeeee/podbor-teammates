<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use App\Broadcasting\ChatChannel;

Broadcast::channel('chat.{chat_id}', ChatChannel::class);

Broadcast::channel('App.Models.User.{user_id}', ChatChannel::class);
