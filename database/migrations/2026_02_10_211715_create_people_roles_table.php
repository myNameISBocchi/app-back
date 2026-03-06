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
        Schema::create('peoples_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peopleId')->constrained(
                table:'peoples', indexName: 'people_id'
            );
            $table->foreignId('roleId')->constrained(
                table:'roles', indexName:'roles_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
