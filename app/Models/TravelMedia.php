<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelMedia extends Model
{
    protected $fillable = [
        'name',
        'vehicle_no',
        'max_passengers',
        'price_per_km',
    ];
}//class