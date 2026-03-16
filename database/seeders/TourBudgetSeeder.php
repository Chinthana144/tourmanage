<?php

namespace Database\Seeders;

use App\Models\TourBudget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourBudget::create(['range' => '1000$ - 5000$']);
        TourBudget::create(['range' => '5000$ - 10000$']);
        TourBudget::create(['range' => '10000$ - 20000$']);
        TourBudget::create(['range' => '20000$ +']);
    }
}
