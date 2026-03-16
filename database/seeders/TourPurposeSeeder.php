<?php

namespace Database\Seeders;

use App\Models\TourPurposes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourPurposes::create(['name' => 'Leisure / Holiday']);
        TourPurposes::create(['name' => 'Honeymoon']);
        TourPurposes::create(['name' => 'Family Vacation']);
        TourPurposes::create(['name' => 'Friends Getaway']);
        TourPurposes::create(['name' => 'Business Travel']);
        TourPurposes::create(['name' => 'Cultural Tour']);
        TourPurposes::create(['name' => 'Adventure Tour']);
        TourPurposes::create(['name' => 'Wildlife / Safari']);
        TourPurposes::create(['name' => 'Educational Tour']);
        TourPurposes::create(['name' => 'Custom / Tailor-Made Tour']);
    }
}
