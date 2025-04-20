<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            // Cambiar nombre y tipo de columna
            $table->renameColumn('tipo_horario', 'tipo');
            $table->string('tipo')->comment("Valores: 'semanal' o 'sabado'")->change();
            
            // Añadir nuevas columnas
            $table->string('nombre')->after('id');
            $table->json('dias')->nullable()->after('tipo');
            $table->boolean('activo')->default(true)->after('hora_fin');
            $table->date('inicio_vigencia')->after('activo');
            $table->date('fin_vigencia')->after('inicio_vigencia');
        });
    }
    
    public function down()
    {
        Schema::table('horarios', function (Blueprint $table) {
            // Revertir cambios
            $table->renameColumn('tipo', 'tipo_horario');
            $table->string('tipo_horario')->change();
            $table->dropColumn(['nombre', 'dias', 'activo', 'inicio_vigencia', 'fin_vigencia']);
        });
    }
};