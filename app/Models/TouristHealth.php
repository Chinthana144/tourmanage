<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristHealth extends Model
{
    protected $fillable = [
        'tourist_id',
        'blood_group_id',
        'dietary_preference_id',
        'allergies',
        'medical_conditions',
        'emergency_contact_name',
        'emergency_contact_phone',
        'notes'
    ];

    public function tourist()
    {
        return $this->belongsTo(Tourists::class, 'tourist_id');
    }

    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id');
    }

    public function dietaryPreference()
    {
        return $this->belongsTo(DietaryPreference::class, 'dietary_preference_id');
    }

}//class
