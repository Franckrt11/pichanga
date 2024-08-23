<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'date',
        'start_date',
        'time',
        'game',
        'price',
        'inscription',
        'status',
        'field_hour_id',
        'field_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class)->with('district');
    }

    public function hour()
    {
        return $this->hasOne(FieldHour::class, 'id', 'field_hour_id');
    }
}
