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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('no_control')->constrained('alumnos');
            $table->foreignId('id_grupo')->constrained('grupos');
            $table->date('fecha_inscripcion');
            $table->enum('estatus_pago', ['Pendiente', 'Pagado', 'Cancelado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
