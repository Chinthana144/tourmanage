<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $table = 'tour_requests';

    protected $fillable = [
        'travel_country_id',
        'tour_purpose_id',
        'tour_budget_id',

        'customer_name',
        'customer_email',
        'customer_phone',

        'travel_date',
        'return_date',

        //people
        'adults',
        'children',
        'infants',

        'rooms_count',

        'description',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function tours()
    {
        return $this->hasMany(Tours::class, 'tour_request_id');
    }

    public function tourRequestPeople()
    {
        return $this->hasMany(TourRequestPeople::class, 'tour_request_id');
    }

    public function tourPurpose()
    {
        return $this->belongsTo(TourPurposes::class, 'tour_purpose_id');
    }
}//class
