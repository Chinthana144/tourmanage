<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationPrices extends Model
{
    protected $fillable = [
        'location_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'description',
        'price',
        'is_complusory',
        'status',
    ];

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }//location

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
}//class
