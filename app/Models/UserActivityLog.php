<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    protected $fillable = [
        'message',
        'user_id',
    ];

    // protected $casts = [
    //     'created_at' => 'date:d/m/Y',
    //     'updated_at' => 'date:d/m/Y',
    // ];
}
