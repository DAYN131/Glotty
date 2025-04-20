<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('aulas', function (Blueprint $table) {
            // Paso 1: Eliminar completamente la clave primaria existente
            DB::statement('ALTER TABLE aulas DROP CONSTRAINT aulas_pkey');
            
            // Paso 2: Cambiar el tipo de columna si es necesario
            $table->string('id_aula')->change();
            
            // Paso 3: Establecer la nueva clave primaria
            $table->primary('id_aula');
            
            // Paso 4: Añadir índice único compuesto (opcional)
            $table->unique(['edificio', 'numero_aula']);
        });
    }

    public function down()
    {
        Schema::table('aulas', function (Blueprint $table) {
            // Para revertir
            $table->dropUnique(['edificio', 'numero_aula']);
            $table->dropPrimary('aulas_pkey');
            $table->integer('id_aula')->change();
            $table->primary('id_aula');
        });
    }
};