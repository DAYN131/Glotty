<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\Inscripcion; // Añade esta línea al inicio del controlador
use Illuminate\Http\Request;


class ProfesorController extends Controller
{
    public function misGrupos()
    {
        $profesor = Auth::guard('profesor')->user();
        
        $grupos = $profesor->grupos()
            ->with(['horario' => function($query) {
                $query->select('id', 'nombre', 'tipo', 'dias', 'hora_inicio', 'hora_fin'); // Añadir 'tipo' y 'dias'
            }])
            ->with(['aula' => function($query) {
                $query->select('id_aula', 'edificio', 'numero_aula');
            }])
            ->withCount(['alumnos' => function($query) {
                $query->where('inscripciones.estatus_inscripcion', 'Aprobada');
            }])
            ->get();

        return view('profesor.grupos.index', compact('grupos'));
    }


    public function show($idGrupo)
    {
     

        $grupo = Grupo::with(['inscripciones.alumno'])->findOrFail($idGrupo);
    
        return view('profesor.grupos.alumnos.show', [
            'grupo' => $grupo,
            'inscripciones' => $grupo->inscripciones()->with('alumno')->get()
        ]);


    }

    public function update(Request $request, $idGrupo)
    {
        $request->validate([
            'calificaciones.*.parcial_1' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
                function ($attribute, $value, $fail) {
                    if ($value !== null && ($value < 0 || $value > 100)) {
                        $fail('La calificación debe estar entre 0 y 100');
                    }
                }
            ],
            'calificaciones.*.parcial_2' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
                function ($attribute, $value, $fail) use ($request) {
                    $index = explode('.', $attribute)[1];
                    if ($value !== null) {
                        // Validar que esté entre 0 y 100
                        if ($value < 0 || $value > 100) {
                            $fail('La calificación debe estar entre 0 y 100');
                        }
                        
                        // Validar que exista el parcial 1
                        if ($request->input("calificaciones.{$index}.parcial_1") === null) {
                            $fail('Debe asignar primero la calificación del 1er parcial');
                        }
                    }
                }
            ]
        ]);

        foreach ($request->calificaciones as $inscripcionId => $calificacion) {
            $inscripcion = Inscripcion::findOrFail($inscripcionId);
            
            $updateData = [];
            
            // Manejar parcial 1 (puede ser null)
            if (array_key_exists('parcial_1', $calificacion)) {
                $updateData['calificacion_parcial_1'] = $calificacion['parcial_1'] !== null ? 
                    (float)$calificacion['parcial_1'] : null;
            }
            
            // Manejar parcial 2 (puede ser null)
            if (array_key_exists('parcial_2', $calificacion)) {
                $updateData['calificacion_parcial_2'] = $calificacion['parcial_2'] !== null ? 
                    (float)$calificacion['parcial_2'] : null;
            }
            
            // Calcular final solo si ambos parciales tienen valor
            if (isset($updateData['calificacion_parcial_1']) && 
                isset($updateData['calificacion_parcial_2']) &&
                $updateData['calificacion_parcial_1'] !== null && 
                $updateData['calificacion_parcial_2'] !== null) {
                $updateData['calificacion_final'] = 
                    ($updateData['calificacion_parcial_1'] + $updateData['calificacion_parcial_2']) / 2;
            } else {
                $updateData['calificacion_final'] = null;
            }
            
            $inscripcion->update($updateData);
        }
        
        return back()->with('success', 'Calificaciones actualizadas correctamente');
    }

    
}