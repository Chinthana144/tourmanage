<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $fillables = [
        'name',
        'address',
        'email',
        'phone',
        'province_id',
        'district_id',
        'city_id',
        'website',
        'star_rating',
        'latitude',
        'longitude',
        'cover_image',
        'image1',
        'image2',
        'status',
    ];

    public function hotelRoomType()
    {
        return $this->hasMany(HotelRoomTypes::class, 'hotel_id');
    }

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
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
}
