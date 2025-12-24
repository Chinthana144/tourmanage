<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id');
            $table->foreignId('tour_route_id');
            $table->foreignId('meal_type_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price_per_adult', 10, 2);
            $table->decimal('price_per_child', 10, 2);
            $table->decimal('total_price_adult', 10, 2);
            $table->decimal('total_price_child', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->tinyInteger('status');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_meals');
    }
};
