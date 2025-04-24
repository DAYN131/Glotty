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
            // 1. Verificar y eliminar columnas obsoletas
            if (Schema::hasColumn('inscripciones', 'periodo')) {
                $table->dropColumn('periodo');
            }
            
            // 2. Modificar la columna existente en lugar de agregar una nueva
            if (Schema::hasColumn('inscripciones', 'periodo_cursado')) {
                $table->string('periodo_cursado', 10)->nullable()->change();
            } else {
                $table->string('periodo_cursado', 10)->nullable()->comment('Formato YYYY-N (ej. 2025-1)');
            }
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            // No revertir los cambios de tipo para evitar problemas
            // Solo revertir lo absolutamente necesario
            $table->string('periodo_cursado', 20)->change();
        });
    }
};