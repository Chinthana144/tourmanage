<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = [
        'name'
    ];

    public function health()
    {
        return $this->hasMany(TouristHealth::class, 'blood_group_id');
    }
}
