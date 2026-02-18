<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPriceModes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tourHotelPrice()
    {
        return $this->hasMany(TourHotelPrices::class, 'price_mode_id');
    }
}
