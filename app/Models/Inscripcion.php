<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    const ESTATUS_INSCRIPCION = [
        'Pendiente' => 'Pendiente',
        'Aprobada' => 'Aprobada', 
        'Expirada' => 'Expirada'
    ];

    const ESTATUS_PAGO = [
        'Pendiente' => 'Pendiente',
        'Aprobado' => 'Aprobado',
        'Rechazado' => 'Rechazado'
    ];
    
    
    protected $fillable = [
        'no_control',
        'id_grupo',
        'periodo',
        'fecha_inscripcion',
        'estatus_pago',
        'estatus_inscripcion',
        'nivel_solicitado', // ¡Añade este campo!
        'calificacion_final'
    ];

    protected $casts = [
        'fecha_inscripcion' => 'datetime',
        // Otros campos de fecha...
    ];


    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'no_control', 'no_control');
    }
    
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
}