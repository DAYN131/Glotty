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
            $table->string('nivel_ingles');
            $table->string('letra_grupo');
            $table->string('anio');
            $table->string('periodo');
            $table->foreignId('id_horario')->constrained('horarios');
            $table->foreignId('id_aula')->constrained('aulas');
            $table->string('rfc_coordinador')->constrained('coordinadores');
            $table->string('rfc_profesor')->constrained('profesores');
            $table->timestamps();
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