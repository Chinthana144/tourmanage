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
        Schema::create('tour_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_route_id');
            $table->foreignId('hotel_id');
            $table->foreignId('boarding_type_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('nights');
            $table->decimal('hotel_total_price', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_hotels');
    }
};
