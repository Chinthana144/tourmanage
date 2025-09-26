<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'district_id',
        'name_en',
        'name_si',
        'name_ta',
        'sub_name_en',
        'sub_name_si',
        'sub_name_ta',
        'postcode',
        'latitude',
        'longitude'
    ];

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }

    public function locations()
    {
        return $this->hasMany(Locations::class, 'city_id');
    }
}
