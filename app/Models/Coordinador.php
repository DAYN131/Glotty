<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Coordinador extends Authenticatable
{
    protected $table = 'coordinadores';
    protected $primaryKey = 'rfc_coordinador'; // Especifica la clave primaria
    public $incrementing = false; // Indica que no es autoincremental
    protected $keyType = 'string'; // Tipo de la clave primaria

    protected $fillable = [
        'rfc_coordinador',
        'nombre_coordinador', // Asegúrate de incluir este campo
        'apellidos_coordinador', // Asegúrate de incluir este campo
        'num_telefono',
        'correo_coordinador',
        'contraseña',
    ];

    protected $hidden = [
        'contraseña', // Asegúrate de que coincida con la columna de la base de datos
    ];

    // Sobrescribe el método para obtener la columna de contraseña
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}