<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $fillable = ['name_en', 'name_si', 'name_ta'];

    public function districts()
    {
        return $this->hasMany(Districts::class, 'province_id');
    }
}
