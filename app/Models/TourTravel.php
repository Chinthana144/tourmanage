<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourTravel extends Model
{
    protected $fillable = [
        'tour_id',
        'tour_route_id',
        'travel_media_id',
        'startable_type',
        'startable_id',
        'endable_type',
        'endable_id',
        'distance_km',
        'duration_minutes',
        'price',
        'notes',
    ];

    public function startable()
    {
        return $this->morphTo();
    }

    public function endable()
    {
        return $this->morphTo();
    }

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }

    public function route()
    {
        return $this->belongsTo(TourRouteItems::class, 'tour_route_id');
    }
}//class