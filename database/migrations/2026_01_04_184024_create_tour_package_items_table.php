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
        Schema::create('tour_package_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tour_id");
            $table->foreignId('season_id');
            $table->foreignId('package_id');
            $table->foreignId('price_mode_id');
            $table->morphs('component');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_package_items');
    }
};
