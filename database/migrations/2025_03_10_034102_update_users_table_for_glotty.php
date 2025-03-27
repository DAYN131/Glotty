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
        Schema::table('users', function (Blueprint $table) {
            // Agregar el campo 'role' para identificar el tipo de usuario
            $table->enum('role', ['profesor', 'coordinador', 'alumno'])->default('alumno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar el campo 'role' si se revierte la migración
            $table->dropColumn('role');
        });
    }
};
