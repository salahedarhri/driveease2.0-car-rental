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
        Schema::create('option_reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('option_id')->references('id')->on('location_options')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_reservation');
    }
};
