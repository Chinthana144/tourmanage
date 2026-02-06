<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPrices extends Model
{
    protected $fillable = [
        'hotel_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'bording_type_id',
        'description',
        'price',
        'status',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }

    public function season()
    {
        return $this->belongsTo(Seasons::class, 'season_id');
    }

    public function package()
    {
        return $this->belongsTo(TourPackages::class, 'package_id');
    }

    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'price_mode_id');
    }

    public function boardingType()
    {
        return $this->belongsTo(BoardingType::class, 'boarding_type_id');
    }
    
}//class
