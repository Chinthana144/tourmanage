<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPrices extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Activities()
    {
        return $this->hasMany(Activities::class, 'pricing_type_id');
    }
}//class
