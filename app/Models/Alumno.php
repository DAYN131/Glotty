<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    protected $table = 'alumnos';
    protected $primaryKey = 'no_control'; // Clave primaria personalizada
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    protected $keyType = 'string'; // Tipo de la clave primaria

    protected $fillable = [
        'no_control', 
        'nombre_alumno',
        'apellidos_alumno',
        'carrera',
        'correo_institucional',
        'contraseña',
        'nivel_cursado_anterior', // Nuevo campo importante para el MVP
        'es_nuevo' // Nuevo campo para identificar alumnos nuevos
    ];

    protected $hidden = [
        'contraseña', // Oculta la contraseña en las respuestas
    ];

    /**
     * Obtiene el nombre de la columna que se utiliza como contraseña.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contraseña; // Indica que la columna "contraseña" es la que almacena la contraseña
    }

    // Relación con inscripciones (historial completo)
    public function inscripciones() {
        return $this->hasMany(Inscripcion::class, 'no_control', 'no_control');
    }

    /**
     * Grupos a los que está inscrito el alumno
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'inscripciones', 'no_control', 'id_grupo')
                   ->using(Inscripcion::class)
                   ->withPivot([
                       'periodo', 
                       'anio',
                       'estatus_inscripcion', 
                       'calificacion_final',
                       'nivel_solicitado' // Nuevo campo para el MVP
                   ]);
    }

    /**
     * Método para obtener el nivel recomendado (simplificado para MVP)
     */
    public function nivelRecomendado()
    {
        // Para alumnos nuevos, siempre recomendar nivel 1
        if ($this->es_nuevo) {
            return 1;
        }
        
        // Para alumnos existentes, usar el nivel_cursado_anterior + 1
        // (En una versión futura esto se calcularía automáticamente)
        return $this->nivel_cursado_anterior + 1;
    }



}

    

    
