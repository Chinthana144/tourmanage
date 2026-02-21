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
        'package_prices',
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

    public function quotationItem()
    {
        return $this->hasMany(QuotationItems::class, 'quotation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}//class
