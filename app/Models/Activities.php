<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = [
        'travel_country_id',
        'name',
        'category_id', //adventure, cultural, wildlife, leisure
        'description',
        'is_paid',
        'duration_minutes',
        'best_time_id', //morning, evening, fullday
        'is_optional',
        'requires_guide',
        'cover_image',
        'image1',
        'image2',
        'popularity',
        'status',
    ];

    public function activityCategory()
    {
        return $this->belongsTo(ActivityCategories::class, 'category_id');
    }

    public function activitytTime()
    {
        return $this->belongsTo(ActivityTimes::class, 'best_time_id');
    }

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }
}//class
