<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPrices extends Model
{
    protected $fillable = [
        'activity_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'description',
        'price',
        'is_compulsory',
        'status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activity_id');
    }
    public function season()
    {
        return $this->belongsTo(Seasons::class, 'season_id');
    }
    public function package()
    {
        return $this->belongsTo(TourPackages::class, 'package_id');
    }
    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'price_mode_id');
    }
}//class