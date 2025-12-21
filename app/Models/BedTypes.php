<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BedTypes extends Model
{
    protected $fillable = [
        'name',
    ];

    public function hotelRoomTypes()
    {
        return $this->hasMany(HotelRoomTypes::class, 'bed_type_id');
    }

    public function tourRequests()
    {
        return $this->hasMany(TourRequest::class, 'boarding_type_id');
    }
}//class
