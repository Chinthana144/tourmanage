<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $fillable = ['province_id', 'name_en', 'name_si', 'name_ta'];

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }

    public function cities()
    {
        return $this->hasMany(Cities::class, 'district_id');
    }
}
