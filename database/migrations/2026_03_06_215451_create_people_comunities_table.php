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
        Schema::create('peoples_comunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peopleId')->constrained(
                table:'peoples',indexName:'people_comunities_id'
            );
            $table->foreignId('comunityId')->constrained(
                table:'comunities', indexName:'comunity_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peoples_comunities');
    }
};
