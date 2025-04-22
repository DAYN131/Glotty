<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    
    protected $fillable = [
        'no_control',
        'id_grupo',
        'fecha_inscripcion',
        'estatus_pago', // Pendiente/Pagado/Cancelado
        'estatus_inscripcion', // Pendiente/Aprobado/Rechazado/Baja
        'calificacion_final' // Opcional para futuro
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