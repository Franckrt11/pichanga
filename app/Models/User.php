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
        'password',
        'birth',
        'sex',
        'status',
        'photo',
        'google_id',
        'facebook_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];

    public function sexString()
    {
        $sex = [
            'male' => 'Masculino',
            'female' => 'Femenino'
        ];
        return $sex[$this->sex];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
