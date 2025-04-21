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
        'nivel_ingles',
        'letra_grupo',
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

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'rfc_profesor', 'rfc_profesor');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'id_aula', 'id_aula');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
}