<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourRequestPeople extends Model
{
    protected $fillable = [
        'group_composition_id',
        'adults',
        'children',
        'extra_bed',
        'quantity',
    ];

    public function groupComposition()
    {
        return $this->belongsTo(GroupComposition::class, 'group_composition_id');
    }
}//class
