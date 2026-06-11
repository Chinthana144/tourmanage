<?php

namespace Database\Seeders;

use App\Models\ActivityCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityCategories::create(['name' => 'Adventure']);
        ActivityCategories::create(['name' => 'Cultural']);
        ActivityCategories::create(['name' => 'Wildlife']);
        ActivityCategories::create(['name' => 'Leisure']);
    }
}
