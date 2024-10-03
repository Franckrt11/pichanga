<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;

class Field extends Model
{
    use LaravelCoordinate;

    public $_latitudeName = "map_latitude";
    public $_longitudeName = "map_longitude";

    protected $fillable = [
        'size',
        'type',
        'players',
        'games',
        'active',
        'portrait',
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
