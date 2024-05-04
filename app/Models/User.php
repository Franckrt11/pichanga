<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'district',
        'password',
        'status',
        'photo',
        'push',
        'mailing',
        'google_id',
        'facebook_id'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'status'=> 'boolean',
        'push'=> 'boolean',
        'mailing'=> 'boolean',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
