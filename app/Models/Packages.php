<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price_per_person',
        'duration_days',
        'availability_startdate',
        'availability_enddate',
        'status',
        'cover_image'
    ];

    public function routes()
    {
        return $this->hasMany(PackageRoutes::class, 'package_id');
    }
}
