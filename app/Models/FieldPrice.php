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

    protected $casts = [
        'active'=> 'boolean',
    ];

    public function day()
    {
        return $this->belongsTo(FieldHour::class, 'id', 'field_hour_id');
    }
}
