<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloodGroup::create(['name' => 'A+']);
        BloodGroup::create(['name' => 'A-']);
        BloodGroup::create(['name' => 'B+']);
        BloodGroup::create(['name' => 'B-']);
        BloodGroup::create(['name' => 'AB+']);
        BloodGroup::create(['name' => 'AB-']);
        BloodGroup::create(['name' => 'O+']);
        BloodGroup::create(['name' => 'O-']);
    }
}
