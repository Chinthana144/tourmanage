<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourists extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'passport_no',
        'country_id',
        'address',
        'dob',
        'language_id',
        'profile_picture',
        'note',
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function language()
    {
        return $this->belongsTo(Languages::class, 'language_id');
    }

}//class
