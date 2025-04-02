<?php

namespace App\Http\Controllers; // Namespace correcto

use App\Models\Grupo;
use App\Models\Profesor;
use App\Models\Aula;
use App\Models\Horario;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with(['profesor', 'aula', 'horario'])
                    ->orderBy('nivel_ingles')
                    ->orderBy('letra_grupo')
                    ->get();
        
        return view('coordinador.grupos.index', compact('grupos'));
    }

    public function create()
    {
        $profesores = Profesor::all();
        $aulas = Aula::all();
        $horarios = Horario::all();
        
        return view('coordinador.grupos.create', compact('profesores', 'aulas', 'horarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nivel_ingles' => 'required|integer|between:1,5',
            'letra_grupo' => 'required|string|size:1',
            'anio' => 'required|integer|digits:2',
            'periodo' => 'required|integer|between:1,4',
            'id_horario' => 'required|exists:horarios,id_horario',
            'id_aula' => 'required|exists:aulas,id_aula',
            'id_profesor' => 'required|exists:profesores,rfc_profesor'
        ]);

        // Crear ID del grupo (Nivel_Grupo_Año_Periodo_Horario)
        $validated['id_grupo'] = sprintf('%d%s%d%d%s',
            $validated['nivel_ingles'],
            $validated['letra_grupo'],
            $validated['anio'],
            $validated['periodo'],
            substr($validated['id_horario'], 0, 1)
        );

        Grupo::create($validated);

        return redirect()->route('coordinador.grupos')
            ->with('success', 'Grupo creado exitosamente');
    }
}