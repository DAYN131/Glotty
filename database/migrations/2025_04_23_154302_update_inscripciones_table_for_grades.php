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
        Schema::table('inscripciones', function (Blueprint $table) {
            // Eliminar campos obsoletos
            $table->dropColumn(['estatus_pago', 'observaciones', 'calificacion_final','periodo']);
            
            // Primero agregar como nullable
            $table->string('periodo_cursado', 20)->nullable()->comment('Ej: 2024-1, 2024-2');
            
            // Agregar otros campos
            $table->decimal('calificacion_parcial_1', 5, 2)->nullable();
            $table->decimal('calificacion_parcial_2', 5, 2)->nullable();
            $table->decimal('calificacion_final', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
