<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_horario',
        'hora_inicio',
        'hora_fin'
    ];

    /**
     * Obtener los grupos asociados a este horario
     */
    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_horario');
    }

    /**
     * Accesor para mostrar el horario formateado
     */
    public function getHorarioCompletoAttribute()
    {
        return "{$this->hora_inicio->format('H:i')} - {$this->hora_fin->format('H:i')} ({$this->tipo_horario})";
    }

    /**
     * Scope para filtrar horarios por tipo
     */
    public function scopeTipo($query, $tipo)
    {
        return $query->where('tipo_horario', $tipo);
    }
}