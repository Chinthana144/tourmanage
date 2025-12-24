<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    protected $fillable = [
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
}//class
