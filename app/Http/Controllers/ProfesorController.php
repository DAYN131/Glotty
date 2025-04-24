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
                $query->select('id', 'nombre','hora_inicio','hora_fin'); // Asegurar que horario devuelve string
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
            'calificaciones.*.parcial_1' => 'required|numeric|min:0|max:100',
            'calificaciones.*.parcial_2' => 'required|numeric|min:0|max:100'
        ]);

        foreach ($request->calificaciones as $inscripcionId => $calificacion) {
            $inscripcion = Inscripcion::findOrFail($inscripcionId);
            
            $inscripcion->update([
                'calificacion_parcial_1' => $calificacion['parcial_1'],
                'calificacion_parcial_2' => $calificacion['parcial_2'],
                'calificacion_final' => ($calificacion['parcial_1'] + $calificacion['parcial_2']) / 2
            ]);
        }
        
        return back()->with('success', 'Calificaciones actualizadas correctamente');
    }

  

    
}