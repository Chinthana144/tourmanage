<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackages extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tourHotel()
    {
        return $this->hasMany(TourHotels::class, 'tour_package_id');
    }
}
