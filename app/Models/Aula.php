<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $primaryKey = 'id_aula';
    public $incrementing = false;
    protected $keyType = 'string';

protected $fillable = [
    'edificio',
    'numero_aula', 
    'capacidad',
    'tipo_aula',
];
}