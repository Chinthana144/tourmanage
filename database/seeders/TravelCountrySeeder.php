<?php

namespace Database\Seeders;

use App\Models\TravelCountries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TravelCountries::create(['name' => 'Sri Lanka']);
        TravelCountries::create(['name' => 'Maldives']);
    }
}
