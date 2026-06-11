<?php

namespace Database\Seeders;

use App\Models\PriceModes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceModes::create(['name' => 'Per Person']);
        PriceModes::create(['name' => 'Per Group']);
        PriceModes::create(['name' => 'Per Day']);
        PriceModes::create(['name' => 'Per Room']);
        PriceModes::create(['name' => 'Per Km']);
        PriceModes::create(['name' => 'Flat']);
    }
}
