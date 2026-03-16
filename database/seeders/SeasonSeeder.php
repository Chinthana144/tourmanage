<?php

namespace Database\Seeders;

use App\Models\Seasons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seasons::create(['name' => 'Season']);
        Seasons::create(['name' => 'Off Season']);
    }
}
