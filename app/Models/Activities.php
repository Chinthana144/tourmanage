<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = [
        'location_id',
        'name',
        'category_id', //adventure, cultural, wildlife, leisure
        'description',
        'is_paid',
        'pricing_type_id',//per_person / per_group
        'price_adult',
        'price_child',
        'group_price',
        'duration_minutes',
        'best_time_id', //morning, evening, fullday
        'is_optional',
        'requires_guide',
        'notes',
        'status',
    ];
}//class
