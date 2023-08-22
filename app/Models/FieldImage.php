<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    protected $fillable = [
        'filename',
        'position',
        'field_id'
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
