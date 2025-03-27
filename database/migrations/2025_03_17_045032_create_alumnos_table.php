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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('no_control')->primary();
            $table->string('nombre_alumno');
            $table->string('apellidos_alumno');
            $table->string('carrera');
            $table->string('correo_institucional')->unique();
            $table->string('contraseña');
            $table->foreignId('id_grupo')->constrained('grupos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
