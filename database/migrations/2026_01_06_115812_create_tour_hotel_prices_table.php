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
        Schema::create('tour_hotel_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_route_item_id');
            $table->foreignId('hotel_id');
            $table->foreignId('price_mode_id');
            $table->string('price_description');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_hotel_prices');
    }
};
