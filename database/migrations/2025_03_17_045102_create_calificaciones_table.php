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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('no_control')->constrained('alumnos');
            $table->foreignId('id_grupo')->constrained('grupos');
            $table->string('rfc_profesor')->constrained('profesores');
            $table->decimal('parcial_1', 5, 2)->nullable();
            $table->decimal('parcial_2', 5, 2)->nullable();
            $table->decimal('parcial_3', 5, 2)->nullable();
            $table->date('fecha_parcial_1')->nullable();
            $table->date('fecha_parcial_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
