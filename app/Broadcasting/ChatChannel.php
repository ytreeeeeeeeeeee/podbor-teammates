<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatChannel
{
    public function __construct()
    {
        //
    }

    public function join(User $user)
    {
        return Auth::check();
    }
}
