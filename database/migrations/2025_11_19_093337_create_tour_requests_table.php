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
            $table->foreignId('travel_country_id');
            $table->foreignId('tour_purpose_id');
            $table->foreignId('tour_budget_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');

            $table->date('travel_date');
            $table->date('return_date')->nullable();

            $table->integer('adults');
            $table->integer('children')->default(0);
            $table->integer('infants')->default(0);

            $table->integer('rooms_count')->default(1);

            $table->text('description')->nullable();
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
