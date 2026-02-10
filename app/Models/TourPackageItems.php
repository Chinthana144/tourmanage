<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackageItems extends Model
{
    protected $fillable = [
        'tour_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'component_type',
        'component_id',
        'description',
        'price',
        'status',      
    ];

    public function component()
    {
        return $this->morphTo();
    }

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }

    public function season()
    {
        return $this->belongsTo(Seasons::class, 'season_id');
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackages::class, 'package_id');
    }

    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'price_mode_id');
    }
}//class
