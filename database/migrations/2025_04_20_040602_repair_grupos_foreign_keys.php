<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RepairGruposForeignKeys extends Migration
{
    public function up()
    {
        // Verificar y eliminar restricciones solo si existen (método seguro para PostgreSQL)
        DB::statement('
            DO $$
            BEGIN
                IF EXISTS (SELECT 1 FROM pg_constraint WHERE conname = \'grupos_rfc_coordinador_foreign\') THEN
                    ALTER TABLE grupos DROP CONSTRAINT grupos_rfc_coordinador_foreign;
                END IF;
                
                IF EXISTS (SELECT 1 FROM pg_constraint WHERE conname = \'grupos_rfc_profesor_foreign\') THEN
                    ALTER TABLE grupos DROP CONSTRAINT grupos_rfc_profesor_foreign;
                END IF;
            END
            $$;
        ');

        // Volver a crear las restricciones correctamente
        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign('rfc_coordinador')
                ->references('rfc_coordinador')->on('coordinadores')
                ->onDelete('cascade');

            $table->foreign('rfc_profesor')
                ->references('rfc_profesor')->on('profesores')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        // No es necesario implementar el down para una migración de reparación
    }
}