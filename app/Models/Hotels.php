<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $fillables = [
        'travel_country_id',
        'name',
        'address',
        'email',
        'phone',
        'website',
        'star_rating',
        'cover_image',
        'image1',
        'image2',
        'popularity',
        'status',
    ];

    public function hotelRoomType()
    {
        return $this->hasMany(HotelRoomTypes::class, 'hotel_id');
    }

    public function facilities()
    {
        return $this->hasMany(HotelFacilities::class, 'hotel_id');
    }

    public function stoppable()
    {
        return $this->morphMany(PackageRoutes::class, 'stoppable');
    }

    public function tourRooms()
    {
        return $this->hasMany(TourRooms::class, 'tour_hotel_id');
    }

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }
}
