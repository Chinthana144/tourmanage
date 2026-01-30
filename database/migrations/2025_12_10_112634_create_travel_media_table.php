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
        Schema::create('travel_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_country_id');
            $table->string('name');
            $table->string('vehicle_No');
            $table->integer('max_passengers');
            $table->decimal('price_per_km', 8, 2);
            $table->smallInteger('popularity');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_media');
    }
};
