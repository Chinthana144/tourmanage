<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = [
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

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }

    public function ActivityCategory()
    {
        return $this->belongsTo(ActivityCategories::class, 'category_id');
    }

    public function ActivitytTime()
    {
        return $this->belongsTo(ActivityTimes::class, 'best_time_id');
    }

    public function ActivityPrice()
    {
        return $this->belongsTo(ActivityPrices::class, 'pricing_type_id');
    }

    public function routable()
    {
        return $this->morphMany(TourRoutes::class, 'routable');
    }

    
}//class
