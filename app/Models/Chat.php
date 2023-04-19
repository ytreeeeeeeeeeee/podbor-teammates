<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function first_user() {
        return $this->belongsTo(User::class);
    }

    public function second_user() {
        return $this->belongsTo(User::class);
    }
}
