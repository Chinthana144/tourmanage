<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        'shortname',
        'name',
        'phonecode',
        'flag'
    ];

    public function customers()
    {
        return $this->hasMany(Customers::class, 'country_id');
    }
}//class
