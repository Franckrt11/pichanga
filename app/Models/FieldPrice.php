<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldPrice extends Model
{
    protected $fillable = [
        'half',
        'whole',
        'active',
        'field_hour_id'
    ];
}
