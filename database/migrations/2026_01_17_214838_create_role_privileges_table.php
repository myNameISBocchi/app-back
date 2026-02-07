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
        Schema::create('roles_privileges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roleId')->constrained(
                table:'roles', indexName: 'rolesPrivileges_roles_id'
            );
            $table->foreignId('privilegeId')->constrained(
                table:'privileges', indexName: 'rolesPrivileges_privileges_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_privileges');
    }
};
