<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacilities extends Model
{
    protected $fillable = [
        'hotel_id',
        'facilities_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotels::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facilities::class, 'facilities_id');
    }
}
