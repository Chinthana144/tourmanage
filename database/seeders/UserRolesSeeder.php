<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //add user roles
        Roles::created(['role' => 'Admin']);
        Roles::created(['role' => 'Owner']);
        Roles::created(['role' => 'Manager']);
        Roles::created(['role' => 'Accountant']);
        Roles::created(['role' => 'Sales Agent']);
        Roles::created(['role' => 'Booking Manager']);
        Roles::created(['role' => 'Guide']);
        Roles::created(['role' => 'Hotel User']);
        Roles::created(['role' => 'Intern']);
    }
}//class
