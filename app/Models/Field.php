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
        'name',
        'phone',
        'mobile',
        'parking',
        'size',
        'type',
        'players',
        'games',
        'country_id',
        'city_id',
        'district_id',
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

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function district()
    {
        return $this->hasOne(District::class);
    }

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
