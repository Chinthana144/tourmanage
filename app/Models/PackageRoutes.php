<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageRoutes extends Model
{
    protected $fillable = [
        'package_id',
        'stoppable_id',
        'stoppable_type',
        'day_no',
        'order_no',
        'stay_duration',
        'notes'
    ];

    public function stoppable()
    {
        return $this->morphTo();
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }

}//class
