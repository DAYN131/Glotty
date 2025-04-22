<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nivel_ingles', // 1-5 (nivel del curso)
        'letra_grupo',  // A, B, C...
        'anio',
        'periodo',
        'id_horario',
        'id_aula',
        'rfc_profesor',
        'cupo_minimo',
        'cupo_maximo',
        'rfc_coordinador'
    ];

    protected $dates = ['deleted_at'];

    // Relación con profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'rfc_profesor', 'rfc_profesor');
    }

    // Relación con aula
    public function aula()
    {
        return $this->belongsTo(Aula::class, 'id_aula', 'id_aula');
    }

    // Relación con horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }

    // Relación con inscripciones (HAS MANY)
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'id_grupo', 'id');
    }

    // Relación con alumnos (MANY TO MANY a través de inscripciones)
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripciones', 'id_grupo', 'no_control')
                   ->using(Inscripcion::class)
                   ->withPivot([
                       'periodo',
                       'anio',
                       'fecha_inscripcion',
                       'estatus_pago',
                       'estatus_inscripcion',
                       'calificacion_final' // Agregado para futura expansión
                   ]);
    }

    // Método para verificar disponibilidad de cupo
    public function tieneCupoDisponible($periodo)
    {
        $inscritos = $this->inscripciones()
                         ->where('periodo', $periodo)
                         ->where('estatus_inscripcion', 'Aprobado')
                         ->count();
        
        return $inscritos < $this->cupo_maximo;
    }
}