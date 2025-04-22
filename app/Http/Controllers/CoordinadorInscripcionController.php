<?php
namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Auth; // Esta es la línea clave que falta

class CoordinadorInscripcionController extends Controller
{
    public function pendientes()
    {
        $inscripciones = Inscripcion::with([
                'alumno', 
                'grupo' => function($query) {
                    $query->with(['horario', 'profesor']);
                }
            ])
            ->where('estatus_inscripcion', 'Pendiente')
            ->orderBy('fecha_inscripcion')
            ->get();

        return view('coordinador.inscripciones.pendientes', compact('inscripciones'));
    }

    public function aprobar(Inscripcion $inscripcion)
    {
        // Verificar cupo considerando nivel_solicitado
        if ($inscripcion->grupo->nivel_ingles != $inscripcion->nivel_solicitado) {
            return back()->with('error', 'El nivel del grupo no coincide con el solicitado por el alumno');
        }

        $inscritos = Inscripcion::where('id_grupo', $inscripcion->id_grupo)
            ->where('periodo', $inscripcion->periodo)
            ->where('estatus_inscripcion', 'Aprobado')
            ->count();

        if ($inscritos >= $inscripcion->grupo->cupo_maximo) {
            return back()->with('error', 'El grupo ha alcanzado su cupo máximo');
        }

        $inscripcion->update([
            'estatus_inscripcion' => 'Aprobado',
            'updated_at' => now()
        ]);

        return back()->with('success', 'Inscripción aprobada correctamente');
    }

    public function rechazar(Inscripcion $inscripcion)
    {
        $validated = request()->validate([
            'motivo' => 'required|string|max:255'
        ]);

        $inscripcion->update([
            'estatus_inscripcion' => 'Rechazado',
            'observaciones' => $validated['motivo'],
            'updated_at' => now()
        ]);

        return back()->with('success', 'Inscripción rechazada');
    }
}