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
        Schema::create('tour_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('travel_date');
            $table->date('return_date')->nullable();
            $table->integer('number_of_adults');
            $table->integer('number_of_children')->default(0);
            $table->String('tour_pourpose');
            $table->decimal('budget', 10, 2)->nullable();
            $table->text('special_requests')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_requests');
    }
};
