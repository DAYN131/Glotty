<?php
namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoInscripcionController extends Controller{

    
    public function index()
    {
        $alumno = Auth::guard('alumno')->user();
        
        if (!$alumno) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión como alumno']);
        }

        $inscripciones = $alumno->inscripciones()
            ->with(['grupo.horario', 'grupo.profesor', 'grupo.aula'])
            ->latest('fecha_inscripcion')
            ->get();
            
        return view('alumno.inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $alumno = Auth::guard('alumno')->user();
        if (!$alumno) {
            return redirect()->route('login')->withErrors(['error' => 'Debes iniciar sesión como alumno']);
        }

        $nivelRecomendado = $alumno->nivelRecomendado();
        
        // Obtener grupos del nivel recomendado inicialmente
        $gruposDisponibles = $this->obtenerGruposPorNivel($nivelRecomendado);

        return view('alumno.inscripciones.create', [
            'gruposDisponibles' => $gruposDisponibles,
            'nivelRecomendado' => $nivelRecomendado,
        ]);
    }

    public function gruposPorNivel(Request $request)
    {
        try {
            $nivel = $request->query('nivel', 1);
            
            if(!is_numeric($nivel)) {
                return response()->json([
                    'error' => 'Nivel inválido'
                ], 400);
            }
            
            $grupos = $this->obtenerGruposPorNivel($nivel);
            
            return response()->json([
                'html' => view('alumno.inscripciones.partials.grupos', [
                    'grupos' => $grupos,
                    'nivel' => $nivel
                ])->render(),
                'grupos' => $grupos
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al cargar grupos: ' . $e->getMessage()
            ], 500);
        }
    }

    // Función auxiliar para obtener grupos formateados
    private function obtenerGruposPorNivel($nivel)
    {
        return Grupo::where('nivel_ingles', $nivel)
            ->with([
                'horario:id,nombre,hora_inicio,hora_fin,tipo,nombre',
                'profesor:rfc_profesor,nombre_profesor,apellidos_profesor',
                'aula:id_aula,edificio,numero_aula'
            ])
            ->get()
            ->map(function ($grupo) {
                return [
                    'id' => $grupo->id,
                    'nombre_grupo' => "Nivel {$grupo->nivel_ingles}-{$grupo->letra_grupo}",
                    'horario' => $grupo->horario ? 
                        "{$grupo->horario->nombre} ({$grupo->horario->tipo}) {$grupo->horario->hora_inicio} - {$grupo->horario->hora_fin}" : 
                        'Horario no asignado',
                    'profesor' => $grupo->profesor ? 
                        "{$grupo->profesor->nombre_profesor} {$grupo->profesor->apellidos_profesor}" : 
                        'Profesor por asignar',
                    'aula' => $grupo->aula ? 
                        "{$grupo->aula->edificio} - {$grupo->aula->numero_aula}" : 
                        'Aula por asignar',
                    'cupo_disponible' => $grupo->cupo_maximo - $grupo->inscripciones()->count()
                ];
            })
            ->toArray();
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_grupo' => 'required|exists:grupos,id'
        ]);
    
        $alumno = Auth::guard('alumno')->user();
        $grupo = Grupo::find($request->id_grupo);
    
        // Verificación básica de cupo
        if($grupo->inscripciones()->count() >= $grupo->cupo_maximo) {
            return back()->with('error', 'No hay cupo disponible en este grupo');
        }
    
        // Verificar si ya está inscrito en el mismo grupo (opcional)
        if($alumno->inscripciones()->where('id_grupo', $request->id_grupo)->exists()) {
            return back()->with('error', 'Ya estás inscrito en este grupo');
        }
    
        // Crear la inscripción simplificada
        $inscripcion = new Inscripcion([
            'no_control' => $alumno->no_control,
            'id_grupo' => $request->id_grupo,
            'fecha_inscripcion' => now(),
            'estatus_pago' => 'Pendiente',
            'estatus_inscripcion' => 'Pendiente'
        ]);
        
        $inscripcion->save();
    
        return redirect()->route('alumno.inscripciones.index')
            ->with('success', 'Solicitud de inscripción enviada');
    }
}