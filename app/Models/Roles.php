<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fullable = ['role'];

    //relationship with users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
