<?php

namespace Database\Seeders;

use App\Models\BoardingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BoardingType::create([
            'name' => 'Room Only',
            'description' => 'No meals included — just the room.',
        ]);
        BoardingType::create([
            'name' => 'Self-Catering',
            'description' => 'You cook your own meals; a kitchen is provided.',
        ]);
        BoardingType::create([
            'name' => 'Bed & Breakfast (B&B)',
            'description' => 'Breakfast included (usually buffet-style, sometimes à la carte in boutique or luxury hotels).',
        ]);
        BoardingType::create([
            'name' => 'Half Board',
            'description' => 'Breakfast + one main meal (usually dinner); drinks may not be included.',
        ]);
        BoardingType::create([
            'name' => 'Full Board',
            'description' => 'All three main meals included; drinks often cost extra.',
        ]);
        BoardingType::create([
            'name' => 'All-Inclusive',
            'description' => 'Meals, snacks, drinks (alcoholic too), and sometimes activities included.',
        ]);
        BoardingType::create([
            'name' => 'Ultra All-Inclusive',
            'description' => 'All of the above plus extras like 24/7 service, à la carte restaurants, and premium drinks.',
        ]);
    }
}//class
