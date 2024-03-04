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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('idConducteur')->constrained('conducteurs')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('idCar')->constrained('cars')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('idProtection')->constrained('protection_options')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('dateDepart');
            $table->dateTime('dateRetour');
            $table->tinyText('lieuDepart');
            $table->tinyText('lieuRetour');
            $table->integer('minAge');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
