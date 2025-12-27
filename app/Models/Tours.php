<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    protected $fillable = [
        'tour_number',
        'tour_request_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'total_days',
        'total_nights',
        'adults',
        'children',
        'currency_id',
        'sub_total',
        'discount_amount',
        'tax_amount',
        'grand_total',
        'status',
        'note',
    ];

    public function tourRequest()
    {
        return $this->belongsTo(TourRequest::class, 'tour_request_id');
    }
}//class
