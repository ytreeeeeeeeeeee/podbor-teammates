<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function queue() {
        return $this->hasMany(Queue::class);
    }
}
