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
        Schema::create('tour_request_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_request_id');
            $table->foreignId('room_type_id');
            $table->foreignId('bed_type_id');
            $table->integer('adult_count');
            $table->integer('children_count');
            $table->integer('extra_bed_count');
            $table->integer('room_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_request_rooms');
    }
};
