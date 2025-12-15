<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardingType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function hotelPrice()
    {
        return $this->hasMany(HotelPrices::class, 'boarding_type_id');
    }
}//class
