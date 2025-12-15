<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $fillable = [
        'customer_id',
        'travel_date',
        'return_date',
        'number_of_adults',
        'number_of_children',
        'tour_pourpose',
        'budget',
        'special_requests',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
}
