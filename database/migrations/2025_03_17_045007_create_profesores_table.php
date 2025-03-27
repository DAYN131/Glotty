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
        Schema::create('profesores', function (Blueprint $table) {
            $table->string('rfc_profesor')->primary();
            $table->string('nombre_profesor');
            $table->string('apellidos_profesor');
            $table->string('num_telefono');
            $table->string('correo_profesor')->unique();
            $table->string('contraseña');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
