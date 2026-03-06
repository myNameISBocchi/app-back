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
        Schema::create('peoples_councils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peopleId')->constrained(
                table:'peoples', indexName:'people_councils_id'
            );
            $table->foreignId('councilId')->constrained(
                table:'councils', indexName:'council_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_councils');
    }
};
