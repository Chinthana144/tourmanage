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
        Schema::create('tour_request_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_request_id');
            $table->foreignId('group_composition_id');
            $table->integer('adults');
            $table->integer('children');
            $table->smallInteger('extra_bed');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_request_people');
    }
};
