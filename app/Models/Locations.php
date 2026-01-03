<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'name',
        'description',
        'city_id',
        'city_name',
        'disctrict_name',
        'province_name',
        'latitude',
        'longitude',
        'primary_image',
        'image1',
        'image2',
        'image3',
        'image4',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function stoppable()
    {
        return $this->morphMany(PackageRoutes::class, 'stoppable');
    }

    public function routable()
    {
        return $this->morphMany(TourRoutes::class, 'routable');
    }

    public function item()
    {
        return $this->morphMany(TourRouteItems::class, 'item');
    }

    public function activities()
    {
        return $this->hasMany(Activities::class, 'location_id');
    }
}//class
