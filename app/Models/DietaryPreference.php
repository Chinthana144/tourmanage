<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietaryPreference extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function health()
    {
        return $this->hasMany(TouristHealth::class, 'dietary_preference_id');
    }
}
