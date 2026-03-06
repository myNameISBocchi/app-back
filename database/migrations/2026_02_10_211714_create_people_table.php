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
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('identification');
            $table->foreignId('cityId')->constrained(
                table:'cities', indexName:'person_city_id'
            );
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date');
            $table->boolean('status')->default(1);
            $table->string('photoPerson')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
