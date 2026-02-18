<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPurposes extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tourRequest()
    {
        return $this->hasMany(TourRequest::class, 'tour_purpose_id');
    }
}
