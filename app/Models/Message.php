<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function chat() {
        return $this->belongsTo(Chat::class);
    }
}
