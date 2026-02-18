<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupComposition extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tourPurpose()
    {
        return $this->hasMany(GroupComposition::class, 'group_composition_id');
    }
}//class
