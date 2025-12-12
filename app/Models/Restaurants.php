<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'website',
        'province_id',
        'district_id',
        'city_id',
        'latitude',
        'longitude',
        'opening_time',
        'closing_time',
        'cover_image',
        'image1',
        'image2',
    ];

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }
}//class
