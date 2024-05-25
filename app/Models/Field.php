<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'mobile',
        'parking',
        'size',
        'type',
        'players',
        'games',
        'country',
        'city',
        'district',
        'address',
        'map_latitude',
        'map_longitude',
        'active',
        'portrait',
        'company_id'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function images()
    {
        return $this->hasMany(FieldImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
