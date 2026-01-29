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
        'country_id',

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

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function travelCountry()
    {
        return $this->belongsTo(TravelCountries::class, 'travel_country_id');
    }

    public function pourpose()
    {
        return $this->belongsTo(TourPurposes::class, 'tour_purpose_id');
    }

    public function tourBudget()
    {
        return $this->belongsTo(TourBudget::class, 'tour_budget_id');
    }

}//class
