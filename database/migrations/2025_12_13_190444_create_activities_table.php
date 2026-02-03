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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_country_id');
            $table->string('name');
            $table->integer('category_id');
            $table->text('description');
            $table->tinyInteger('is_paid')->default(0);
            $table->integer('duration_minutes');
            $table->integer('best_time_id');
            $table->tinyInteger('is_optional');
            $table->tinyInteger('requires_guide');
            $table->string('cover_image');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
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
        Schema::dropIfExists('activities');
    }
};
