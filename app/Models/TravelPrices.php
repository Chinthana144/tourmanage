<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPrices extends Model
{
    protected $fillable = [
        'travel_media_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'description',
        'price',
        'is_complusory',
        'status',
    ];

    public function travelMedia()
    {
        return $this->belongsTo(TravelMedia::class, 'travel_media_id');
    }//location

    public function season()
    {
        return $this->belongsTo(Seasons::class, 'travel_media_id');
    }//location

    public function package()
    {
        return $this->belongsTo(TourPackages::class, 'travel_media_id');
    }//location

    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'travel_media_id');
    }//location
}//class
