<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'size',
        'type',
        'players',
        'games',
        'active',
        'portrait',
        'rating',
        'location_id'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(FieldImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
