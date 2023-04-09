<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use App\Broadcasting\ChatChannel;

Broadcast::channel('chat.{chat_id}', ChatChannel::class);

Broadcast::channel('teammate-found.{user_id}', ChatChannel::class);

Broadcast::channel('decision-online.{user_id}', ChatChannel::class);

Broadcast::channel('redirect.{user_id}', ChatChannel::class);

Broadcast::channel('continue.{user_id}', ChatChannel::class);
