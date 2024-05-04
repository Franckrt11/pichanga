<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'message', 'sender', 'attach', 'chat_id'
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
