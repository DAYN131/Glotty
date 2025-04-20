<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Eliminar la restricción de clave foránea
            $table->dropForeign(['id_horario']);
            
            // Opcional: Eliminar la columna (comenta si solo quieres quitar la FK)
            // $table->dropColumn('horario_id');
        });
    }

    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Para revertir (solo si no eliminaste la columna)
            $table->foreign('id_horario')
                  ->references('id')
                  ->on('horarios')
                  ->onDelete('cascade');
        });
    }
};