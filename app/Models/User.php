<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function chats() {
        return $this->hasMany(Chat::class);
    }

    public function queue() {
        return $this->hasOne(Queue::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function isAdmin() {
        return $this->role->id === 2;
    }
}
