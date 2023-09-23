<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldHour extends Model
{
    protected $fillable = [
        'start',
        'end',
        'active',
        'field_day_id'
    ];

    protected $casts = [
        'active'=> 'boolean',
    ];
}
