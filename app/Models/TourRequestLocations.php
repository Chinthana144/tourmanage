<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequestLocations extends Model
{
    protected $fillable = [
        'tour_request_id',
        'location_id',
    ];
}
