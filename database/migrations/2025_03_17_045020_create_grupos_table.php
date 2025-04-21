<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->integer('nivel_ingles');
            $table->string('letra_grupo', 1);
            $table->integer('anio');
            $table->string('periodo');
            $table->foreignId('id_horario')->constrained('horarios');
            $table->foreignId('id_aula')->constrained('aulas');
            $table->string('rfc_coordinador'); // Sin constrained aquí
            $table->string('rfc_profesor');    // Sin constrained aquí
            $table->integer('cupo_minimo')->default(10);
            $table->integer('cupo_maximo')->default(30);
            $table->timestamps();
            
            // Las restricciones se agregarán en la migración fix_grupos_foreign_keys
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
}