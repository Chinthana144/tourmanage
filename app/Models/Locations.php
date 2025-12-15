<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'name',
        'description',
        'city_id',
        'city_name',
        'disctrict_name',
        'province_name',
        'latitude',
        'longitude',
        'primary_image',
        'image1',
        'image2',
        'image3',
        'image4',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function stoppable()
    {
        return $this->morphMany(PackageRoutes::class, 'stoppable');
    }
}
