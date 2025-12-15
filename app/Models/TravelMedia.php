<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelMedia extends Model
{
    protected $fillable = [
        'vehicle_type',
        'max_passengers',
        'price_per_km',
    ];
}
