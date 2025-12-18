<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRoutes extends Model
{
    protected $fillable = [
        'tour_id',
        'order_no',
        'routable_type',
        'routable_id',
        'day_no',
        'quantity',
        'price_adult',
        'price_child',
        'total_price_adult',
        'total_price_child',
        'line_total',
        'notes',
    ];

    public function routable()
    {
        return $this->morphTo();
    }

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }
}//class
