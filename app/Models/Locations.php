<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'travel_country_id',
        'name',
        'description',
        'primary_image',
        'image1',
        'image2',
        'image3',
        'image4',
        'popularity',
        'status',
        'display',
    ];

    public function stoppable()
    {
        return $this->morphMany(PackageRoutes::class, 'stoppable');
    }

    public function item()
    {
        return $this->morphMany(TourRouteItems::class, 'item');
    }

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }
}//class
