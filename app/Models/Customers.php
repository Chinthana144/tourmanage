<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'country_id',
        'invite_token',
    ];

    public function tourRequests()
    {
        return $this->hasMany(TourRequest::class, 'customer_id');
    }

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
}//class
