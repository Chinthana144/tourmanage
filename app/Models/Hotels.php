<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $fillables = [
        'name',
        'address',
        'email',
        'phone',
        'province_id',
        'district_id',
        'city_id',
        'website',
        'star_rating',
        'latitude',
        'longitude',
        'cover_image',
        'image1',
        'image2',
        'status',
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
}
