<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourHotels extends Model
{
    protected $fillable = [
        'tour_route_id',
        'tour_package_id',
        'hotel_id',
        'boarding_type_id',
        'check_in_date',
        'check_out_date',
        'nights',
        'hotel_total_price',
        'facilities',
    ];

    public function tourRoute()
    {
        return $this->belongsTo(TourRouteItems::class, 'tour_route_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'hotel_id');
    }

    public function boardingType()
    {
        return $this->belongsTo(BoardingType::class, 'boarding_type_id');
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackages::class, 'tour_package_id');
    }
}//class
