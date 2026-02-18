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
        Schema::create('tour_route_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id');
            $table->integer('day_no');
            $table->integer('order_no');
            $table->morphs('item');
            $table->string('notes');
            $table->tinyInteger('is_optional')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_route_items');
    }
};
