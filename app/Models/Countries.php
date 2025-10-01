<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        'country_name',
        'code1',
        'code2',
        'flag'
    ];
}
