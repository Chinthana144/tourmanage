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
        Schema::create('tour_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_route_item_id')->constrained('tour_route_items')->onDelete('cascade');
            $table->foreignId('tour_hotel_id');
            $table->foreignId('tour_package_id');
            $table->foreignId('room_type_id');
            $table->foreignId('bed_type_id');
            $table->integer('base_adults');
            $table->integer('base_children');
            $table->integer('room_quantity');
            $table->decimal('price_per_night', 10, 2);
            $table->decimal('extra_bed_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_rooms');
    }
};
