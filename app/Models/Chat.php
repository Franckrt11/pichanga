<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'last_message', 'last_sender', 'user_id', 'company_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
