<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldDay extends Model
{
    protected $fillable = [
        'day',
        'active',
        'field_id'
    ];

    protected $casts = [
        'active'=> 'boolean',
    ];
}
