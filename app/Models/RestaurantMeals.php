<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantMeals extends Model
{
    protected $fillable = [
        'restaurant_id',
        'tour_route_id',
        'meal_type_id',
        'name',
        'description',
        'price_per_adult',
        'price_per_child',
        'total_price_adult',
        'total_price_child',
        'total_price',
        'opening_time',
        'closing_time',
        'status',
        'notes',
    ];

    public function restaurant()
    {
        return  $this->belongsTo(Restaurants::class, 'restaurant_id');
    }

    public function tourRoute()
    {
        return $this->belongsTo(TourRoutes::class, 'tour_route_id');
    }

    public function mealType()
    {
        return $this->belongsTo(MealTypes::class, 'meal_type_id');
    }
}//class
