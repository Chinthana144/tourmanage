<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilitiesType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function facilities()
    {
        return $this->hasMany(Facilities::class, 'facilities_type_id');
    }
}
