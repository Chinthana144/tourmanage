<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategories extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Activities()
    {
        return $this->hasMany(Activities::class, 'category_id');
    }
}//class
