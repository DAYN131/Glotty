<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
           
            
            $table->string('id_aula')->change();
            
            $table->foreign('id_aula')
                  ->references('id_aula')
                  ->on('aulas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->integer('id_aula')->change();
            $table->foreign('id_aula')
                  ->references('id_aula')
                  ->on('aulas')
                  ->onDelete('cascade');
        });
    }
};