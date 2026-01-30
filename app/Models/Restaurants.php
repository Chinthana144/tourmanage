<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = [
        'travel_country_id',
        'name',
        'address',
        'phone',
        'website',
        'opening_time',
        'closing_time',
        'cover_image',
        'image1',
        'image2',
        'popularity',
        'status',
    ];

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }
}//class
