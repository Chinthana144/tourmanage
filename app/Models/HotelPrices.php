<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPrices extends Model
{
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'season_name',
        'season_start_date',
        'season_end_date',
        'price_per_night',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }
    
}//class
