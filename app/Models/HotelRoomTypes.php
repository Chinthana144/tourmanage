<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomTypes extends Model
{
    protected $fillable = [
        'hotel_id', 
        'room_type_id',
        'description',
        'bed_type_id',
        'max_adults',
        'max_children',
        'max_guests_total',
        'size_sqft',
        'amenities',
        'smoking_allowed',
        'has_breakfast',
        'has_free_cancellation',
        'extra_bed_allowed',
        'extra_bed_price',
        'base_price_per_night',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }

    public function bedType()
    {
        return $this->belongsTo(BedTypes::class, 'bed_type_id');
    }

    public function hotelRoom()
    {
        return $this->hasMany(HotelPrices::class, 'hotel_room_type_id');
    }
}//class
