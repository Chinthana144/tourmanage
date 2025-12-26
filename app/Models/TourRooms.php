<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRooms extends Model
{
    protected $fillable = [
        'tour_hotel_id',
        'room_type_id',
        'bed_type_id',
        'base_adults',
        'base_children',
        'room_quantity',
        'price_per_night',
        'extra_bed_price',
    ];

    public function tourHotel()
    {
        return $this->belongsTo(TourHotels::class, 'tour_hotel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }

    public function bedTypes()
    {
        return $this->belongsTo(BedTypes::class, 'bed_type_id');
    }
}//class
