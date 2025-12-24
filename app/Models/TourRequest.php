<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $fillable = [
        'customer_id',
        'boarding_type_id',
        'travel_date',
        'return_date',
        'adults',
        'children',
        'infants',
        'tour_pourpose',
        'budget',
        'special_requests',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function boardingType()
    {
        return $this->belongsTo(BoardingType::class, 'boarding_type_id');
    }

    public function tours()
    {
        return $this->hasMany(Tours::class, 'tour_request_id');
    }
}//class
