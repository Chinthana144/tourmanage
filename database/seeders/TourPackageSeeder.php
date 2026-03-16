<?php

namespace Database\Seeders;

use App\Models\TourPackages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourPackages::create(['name' => 'Akagi Essential']);
        TourPackages::create(['name' => 'Akagi Classic']);
        TourPackages::create(['name' => 'Akagi Signature']);
    }
}
