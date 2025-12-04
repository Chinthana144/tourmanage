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
        Schema::create('hotel_room_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('room_type_id');
            $table->text('description');
            $table->unsignedBigInteger('bed_type_id');
            $table->integer('max_adults');
            $table->integer('max_children');
            $table->integer('max_guests_total');
            $table->integer('size_sqft');
            $table->json('amenities')->nullable();
            $table->tinyInteger('smoking_allowed');
            $table->tinyInteger('has_breakfast');
            $table->tinyInteger('has_free_cancellation');
            $table->tinyInteger('extra_bed_allowed');
            $table->decimal('extra_bed_price', 10,2);
            $table->decimal('base_price_per_night', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_types');
    }
};
