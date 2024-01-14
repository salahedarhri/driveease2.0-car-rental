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
        Schema::create('location_options', function (Blueprint $table) {
            $table->id();
            $table->string('option');
            $table->string('urlPhoto');
            $table->longText('description');
            $table->decimal('prix');
            // $table->boolean('inclus')->default(false);
            // $table->integer('quantite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_options');
    }
};
