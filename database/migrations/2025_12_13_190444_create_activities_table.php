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
            $table->foreignId('location_id');
            $table->string('name');
            $table->string('category');
            $table->string('description');
            $table->tinyInteger('is_paid')->default(0);
            $table->string('pricing_type')->nullable();
            $table->decimal('price_adult', 10, 2)->nullable();
            $table->decimal('price_child', 10, 2)->nullable();
            $table->decimal('group_price', 10, 2)->nullable();
            $table->integer('duration_minutes');
            $table->string('best_time');
            $table->tinyInteger('is_optional');
            $table->tinyInteger('requires_guide');
            $table->text('notes')->nullable();
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
