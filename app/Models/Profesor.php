<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Importa Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profesor extends Authenticatable // Extiende Authenticatable
{
    use HasFactory;

    protected $table = 'profesores'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'rfc_profesor'; // Especifica que el RFC es la clave primaria
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    protected $keyType = 'string'; // Tipo de la clave primaria

    protected $fillable = [
        'rfc_profesor', // Agrega el RFC como campo llenable
        'nombre_profesor',
        'apellidos_profesor',
        'correo_profesor',
        'num_telefono',
        'contraseña',
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