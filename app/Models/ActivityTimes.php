<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityTimes extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Activities()
    {
        return $this->hasMany(Activities::class, 'best_time_id');
    }
}//class
