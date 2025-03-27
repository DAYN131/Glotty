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
        'id_grupo', // Opcional, para futura asignación de grupos
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
}