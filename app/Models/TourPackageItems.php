<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackageItems extends Model
{
    protected $fillable = [
        'tour_package_id',
        'tour_route_item_id',
        'component_type',
        'component_id',
        'base_price',        
    ];

    public function component()
    {
        return $this->morphTo();
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackages::class, 'tour_package_id');
    }

    public function tourRouteItem()
    {
        return $this->belongsTo(TourRouteItems::class, 'tour_route_item_id');
    }

    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'price_mode_id');
    }
}//class
