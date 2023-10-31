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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('description');
            $table->double('prix',10,1);
            $table->boolean('disponibilite')->default(true);

            $table->string('transmission');
            $table->string('moteur');
            $table->string('ville');
            $table->integer('nbPers');
            $table->integer('minAge');
            $table->boolean('climatisation')->default(true);

            $table->string('slug')->unique();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
