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
        Schema::create('councils', function (Blueprint $table) {
            $table->id();
            $table->string('councilName');
            $table->foreignId('comunityId')->constrained(
                table:'comunities', indexName: 'councils_comunity_id'
            );
            $table->foreignId('cityId')->constrained(
                table:'cities', indexName:'coucils_cities_id'
            );
            $table->string('googleMaps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('councils');
    }
};
