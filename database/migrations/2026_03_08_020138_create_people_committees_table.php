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
        Schema::create('peoples_committees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peopleId')->constrained(
                table:'peoples', indexName:'people_committee_id'
            );
            $table->foreignId('committeeId')->constrained(
                table:'committees', indexName: 'committees_people_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_committees');
    }
};
