<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelMedia extends Model
{
    protected $fillable = [
        'travel_country_id',
        'name',
        'vehicle_no',
        'max_passengers',
        'price_per_km',
        'popularity',
        'status',
    ];

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }
}//class
