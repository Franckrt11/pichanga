<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldHour extends Model
{
    protected $fillable = [
        'start',
        'end',
        'position',
        'active',
        'field_day_id'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function day()
    {
        return $this->belongsTo(FieldDay::class, 'id', 'field_day_id');
    }

    public function price()
    {
        return $this->hasOne(FieldPrice::class);
    }
}
