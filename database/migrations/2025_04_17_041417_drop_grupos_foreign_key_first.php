<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Eliminar la FK primero
            $table->dropForeign(['id_aula']);
        });
    }

    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Recrear la FK (asumiendo que era integer originalmente)
            $table->foreign('id_aula')
                  ->references('id_aula')
                  ->on('aulas')
                  ->onDelete('cascade');
        });
    }
};