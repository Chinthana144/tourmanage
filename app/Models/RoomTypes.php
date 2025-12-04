<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    protected $fillable = [
        'name',
    ];

    public function hotelRoomTypes()
    {
        return $this->hasMany(HotelRoomTypes::class, 'room_type_id');
    }
}//class
