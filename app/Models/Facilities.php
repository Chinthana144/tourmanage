<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $fillable = [
        'name',
        'facilities_type_id',
    ];

    public function type()
    {
        return $this->belongsTo(FacilitiesType::class, 'facilities_type_id');
    }

    public function hotelFacilities()
    {
        return $this->hasMany(HotelFacilities::class, 'facility_id');
    }
}

