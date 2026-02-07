<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantPrices extends Model
{
    protected $fillable = [
        'restaurant_id',
        'season_id',
        'package_id',
        'price_mode_id',
        'meal_type_id',
        'description',
        'price',
        'is_compulsory',
        'status',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'restaurant_id');
    }

    public function season()
    {
        return $this->belongsTo(Seasons::class, 'restaurant_id');
    }

    public function package()
    {
        return $this->belongsTo(TourPackages::class, 'package_id');
    }

    public function priceMode()
    {
        return $this->belongsTo(PriceModes::class, 'price_mode_id');
    }

    public function mealType()
    {
        return $this->belongsTo(MealTypes::class, 'meal_type_id');
    }
}//class
