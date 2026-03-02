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
        Schema::create('voceros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained(
                table:'users', indexName:'voceros_users_id'
            );
            $table->string('firstName');
            $table->string('lastName');
            $table->string('identification');
            $table->string('phone');
            $table->boolean('status')->default(1);
            $table->foreignId('comunityId')->constrained(
                table:'comunities', indexName:'vocero_comunity_id'
            );
            $table->foreignId('councilId')->constrained(
                table:'councils', indexName:'vocero_council_id'
            );
            $table->foreignId('unitId')->constrained(
                table:'units', indexName:'vocero_unit_id'
            );
            $table->foreignId('committeeId')->constrained(
                table:'committees', indexName:'vocero_committee_id'

            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voceros');
    }
};
