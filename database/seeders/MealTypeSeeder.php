<?php

namespace Database\Seeders;

use App\Models\MealTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MealTypes::create(['name' => 'Breakfast']);
        MealTypes::create(['name' => 'Lunch']);
        MealTypes::create(['name' => 'Dinner']);
        MealTypes::create(['name' => 'Snacks']);
        MealTypes::create(['name' => 'Brunch']);
    }
}
