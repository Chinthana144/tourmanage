<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $table = 'tour_requests';

    protected $fillable = [
        'customer_id',
        'tour_purpose_id',
        'travel_date',
        'return_date',
        'total_adults',
        'total_children',
        'budget',
        'special_requests',
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

    public function tourPurpose()
    {
        return $this->belongsTo(TourPurposes::class, 'tour_purpose_id');
    }
}//class
