<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourHotelPrices extends Model
{
    protected $fillable = [
        'tour_route_item_id',
        'tour_package_id',
        'hotel_id',
        'price_mode_id',
        'price_description',
        'price',
    ];

    public function tourRouteItem()
    {
        return $this->belongsTo(TourRouteItems::class, "tour_route_item_id");
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackages::class, "tour_package_id");
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, "hotel_id");
    }
}//class    
