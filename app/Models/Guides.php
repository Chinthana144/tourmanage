<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'profile_image',
        'languages',
        'rate',
        'travel_media_id',
        'status',
    ];

    public function travelMedia()
    {
        return $this->belongsTo(TravelMedia::class, 'travel_media_id');
    }

    
}//class
