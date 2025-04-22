<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('no_control')->constrained('alumnos');
            $table->foreignId('id_grupo')->constrained('grupos');
            $table->string('periodo'); // Ej: "2024-1" (formato: AÑO-NÚMERO_PERIODO)
            $table->year('anio'); // Año por separado para filtros fáciles
            $table->date('fecha_inscripcion');
            $table->enum('estatus_pago', ['Pendiente', 'Pagado', 'Cancelado'])->default('Pendiente');
            $table->enum('estatus_inscripcion', ['Activo', 'Baja Temporal', 'Baja Definitiva'])->default('Activo');
            $table->decimal('calificacion_final', 5, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Evita duplicados de alumno en mismo grupo/periodo
            $table->unique(['no_control', 'id_grupo', 'periodo']); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
