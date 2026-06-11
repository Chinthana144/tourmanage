<?php

namespace Database\Seeders;

use App\Models\ActivityTimes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityTimes::create(['name' => 'Morning']);
        ActivityTimes::create(['name' => 'Noon']);
        ActivityTimes::create(['name' => 'Evening']);
        ActivityTimes::create(['name' => 'Night']);
        ActivityTimes::create(['name' => 'Full Day']);
        ActivityTimes::create(['name' => 'Day Time Only']);
        ActivityTimes::create(['name' => 'NIght Time Only']);
    }
}
