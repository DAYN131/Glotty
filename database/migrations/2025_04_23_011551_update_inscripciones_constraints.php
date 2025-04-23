<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Actualiza las restricciones CHECK de la tabla inscripciones:
     * - estatus_inscripcion: 'Pendiente', 'Aprobada', 'Expirada'
     * - estatus_pago: 'Pendiente', 'Aprobado', 'Rechazado'
     * 
     * Justificación:
     * - Alinea los estados con el flujo real del proceso de inscripción
     * - Simplifica los estados a los realmente utilizados
     * - Mejora la consistencia de datos
     */
    public function up()
    {
        // Para PostgreSQL necesitamos usar raw SQL
        DB::statement('
            ALTER TABLE inscripciones 
            DROP CONSTRAINT IF EXISTS inscripciones_estatus_inscripcion_check;
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            ADD CONSTRAINT inscripciones_estatus_inscripcion_check 
            CHECK (estatus_inscripcion::text = ANY (ARRAY[\'Pendiente\'::character varying::text, \'Aprobada\'::character varying::text, \'Expirada\'::character varying::text]));
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            DROP CONSTRAINT IF EXISTS inscripciones_estatus_pago_check;
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            ADD CONSTRAINT inscripciones_estatus_pago_check 
            CHECK (estatus_pago::text = ANY (ARRAY[\'Pendiente\'::character varying::text, \'Aprobado\'::character varying::text, \'Rechazado\'::character varying::text]));
        ');
    }

    /**
     * Revertir los cambios (para rollback)
     */
    public function down()
    {
        DB::statement('
            ALTER TABLE inscripciones 
            DROP CONSTRAINT IF EXISTS inscripciones_estatus_inscripcion_check;
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            ADD CONSTRAINT inscripciones_estatus_inscripcion_check 
            CHECK (estatus_inscripcion::text = ANY (ARRAY[\'Activo\'::character varying::text, \'Baja Temporal\'::character varying::text, \'Baja Definitiva\'::character varying::text]));
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            DROP CONSTRAINT IF EXISTS inscripciones_estatus_pago_check;
        ');

        DB::statement('
            ALTER TABLE inscripciones 
            ADD CONSTRAINT inscripciones_estatus_pago_check 
            CHECK (estatus_pago::text = ANY (ARRAY[\'Pendiente\'::character varying::text, \'Pagado\'::character varying::text, \'Cancelado\'::character varying::text]));
        ');
    }
};
