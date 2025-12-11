<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration_days',
        'price_per_person',
        'start_date',
        'end_date',
        'status',
    ];

    
}//class
