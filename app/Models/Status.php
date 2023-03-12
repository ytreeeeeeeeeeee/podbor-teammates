<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
