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
                    'periodo' => $grupo->periodo, // Asegúrate que este campo existe en la tabla grupos
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
        $validated = $request->validate([
            'id_grupo' => 'required|exists:grupos,id'
        ]);

        $alumno = Auth::guard('alumno')->user();
        $grupo = Grupo::find($validated['id_grupo']);

        // Solo incluir campos necesarios
        $inscripcionData = [
            'no_control' => $alumno->no_control,
            'id_grupo' => $validated['id_grupo'],
            'periodo' => $grupo->periodo,
            'fecha_inscripcion' => now()->format('Y-m-d'), // Solo fecha sin hora
            'estatus_pago' => 'Pendiente',
            'estatus_inscripcion' => 'Pendiente',
            'nivel_solicitado' => $alumno->nivelRecomendado()
        ];

        // Depuración: Verifica los datos antes de insertar
        \Log::debug('Datos a insertar:', $inscripcionData);

        Inscripcion::create($inscripcionData);

        return redirect()->route('alumno.inscripciones.index')
            ->with('success', 'Inscripción realizada con éxito');
    }
}