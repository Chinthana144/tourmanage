<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    protected $fillable = [
        'quotation_no',
        'tour_request_id',
        'tour_id',
        'valid_until',
        'total_amount',
        'status',
        'user_id',
    ];

    public function tourRequest()
    {
        return $this->belongsTo(TourRequest::class, 'tour_request_id');
    }

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }

}//class
