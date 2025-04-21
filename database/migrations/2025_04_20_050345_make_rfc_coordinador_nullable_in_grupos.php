<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRfcCoordinadorNullableInGrupos extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Cambiar a nullable temporalmente
            $table->string('rfc_coordinador')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Revertir el cambio
            $table->string('rfc_coordinador')->nullable(false)->change();
        });
    }
}