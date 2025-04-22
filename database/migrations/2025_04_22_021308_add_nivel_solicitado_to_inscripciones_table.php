<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            // Eliminar anio si decides quedarte solo con periodo
            $table->dropColumn('anio');
            
            // Agregar nivel_solicitado si aún no está
            $table->integer('nivel_solicitado')->after('id_grupo');
            
            // Ajustar tipos de datos según tu imagen
            $table->string('estatus_pago', 255)->change();
            $table->string('estatus_inscripcion', 255)->change();
            $table->decimal('calificacion_final', 5, 2)->nullable()->change();
        });
    }
};
