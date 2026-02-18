<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRouteItems extends Model
{
    protected $fillable = [
        'tour_id',
        'day_no',
        'order_no',
        'item_type',
        'item_id',
        'notes',
        'is_optional',
    ];

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }

    public function item()
    {
        return $this->morphTo();
    }
}//class
