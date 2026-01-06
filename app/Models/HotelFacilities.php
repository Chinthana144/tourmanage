<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacilities extends Model
{
    protected $fillable = [
        'hotel_id',
        'facility_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }

    public function facility()
    {
        return $this->belongsTo(Facilities::class, 'facility_id');
    }
}
