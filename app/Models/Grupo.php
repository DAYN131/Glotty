<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'id_grupo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'rfc_profesor');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'id_aula', 'id_aula');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_grupo', 'id_grupo');
    }
}