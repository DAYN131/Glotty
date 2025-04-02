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
        Schema::table('aulas', function (Blueprint $table) {
            // Renombrar id a id_aula
            $table->renameColumn('id', 'id_aula');
            
            // Agregar columna tipo_aula
            $table->string('tipo_aula')->default('regular');
        });
    }
    
    public function down()
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->renameColumn('id_aula', 'id');
            $table->dropColumn('tipo_aula');
        });
    }
};
