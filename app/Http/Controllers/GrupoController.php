<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use App\Models\Profesor;
use App\Models\Aula;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coordinador;
use Illuminate\Support\Facades\Auth; // Esta es la línea clave que falta

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
        $profesores = Profesor::orderBy('nombre_profesor')->get();
        $aulas = Aula::orderBy('edificio')->orderBy('numero_aula')->get();
        $horarios = Horario::where('activo', true)->orderBy('nombre')->get();
        
        return view('coordinador.grupos.create', compact('profesores', 'aulas', 'horarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nivel_ingles' => 'required|integer|between:1,5',
            'letra_grupo' => 'required|string|size:1|alpha',
            'anio' => 'required|integer|digits:4',
            'periodo' => 'required|string|max:20',
            'id_horario' => 'required|exists:horarios,id',
            'id_aula' => 'required|exists:aulas,id_aula',
            'id_profesor' => 'required|exists:profesores,rfc_profesor',
            'cupo_minimo' => 'required|integer|min:1',
            'cupo_maximo' => 'required|integer|min:1|gte:cupo_minimo'
        ]);
    
        // Obtener coordinador autenticado
        $coordinador = auth()->guard('coordinador')->user();
        
        if (!$coordinador) {
            return back()->withErrors(['error' => 'No hay coordinador autenticado']);
        }
    
       
        try {
            $grupo = Grupo::create([
                'nivel_ingles' => $validated['nivel_ingles'],
                'letra_grupo' => strtoupper($validated['letra_grupo']),
                'anio' => $validated['anio'],
                'periodo' => $validated['periodo'],
                'id_horario' => $validated['id_horario'],
                'id_aula' => $validated['id_aula'],
                'rfc_profesor' => $validated['id_profesor'], // Asegúrate que coincida con la columna
                'rfc_coordinador' => $coordinador->rfc_coordinador, // Usa el nombre exacto
                'cupo_minimo' => $validated['cupo_minimo'],
                'cupo_maximo' => $validated['cupo_maximo'],
            ]);
    
            return redirect()->route('coordinador.grupos.index')
                ->with('success', 'Grupo creado exitosamente');
                
        } catch (\Exception $e) {
            \Log::error('Error completo al crear grupo: '.$e->getMessage());
            return back()->withErrors(['error' => 'Error al crear grupo: '.$e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        $profesores = Profesor::orderBy('nombre_profesor')->get();
        $aulas = Aula::orderBy('edificio')->orderBy('numero_aula')->get();
        $horarios = Horario::where('activo', true)->orderBy('nombre')->get();
        
        return view('coordinador.grupos.edit', compact('grupo', 'profesores', 'aulas', 'horarios'));
    }

      // Actualizar grupo
      public function update(Request $request, $id)
      {
          $grupo = Grupo::findOrFail($id);
  
          $validated = $request->validate([
              'nivel_ingles' => 'required|integer|between:1,5',
              'letra_grupo' => 'required|string|size:1|alpha',
              'anio' => 'required|integer|digits:4',
              'periodo' => 'required|string|max:20',
              'id_horario' => 'required|exists:horarios,id',
              'id_aula' => 'required|exists:aulas,id_aula',
              'id_profesor' => 'required|exists:profesores,rfc_profesor',
              'cupo_minimo' => 'required|integer|min:1',
              'cupo_maximo' => 'required|integer|min:1|gte:cupo_minimo'
          ]);
  
          $grupo->update([
              'nivel_ingles' => $validated['nivel_ingles'],
              'letra_grupo' => strtoupper($validated['letra_grupo']),
              'anio' => $validated['anio'],
              'periodo' => $validated['periodo'],
              'id_horario' => $validated['id_horario'],
              'id_aula' => $validated['id_aula'],
              'rfc_profesor' => $validated['id_profesor'],
              'cupo_minimo' => $validated['cupo_minimo'],
              'cupo_maximo' => $validated['cupo_maximo'],
          ]);
  
          return redirect()->route('coordinador.grupos.index')
              ->with('success', 'Grupo actualizado exitosamente');
      }
  
      // Eliminar grupo (soft delete)
      public function destroy($id)
      {
          $grupo = Grupo::findOrFail($id);
  
         
          $grupo->delete();
  
          return redirect()->route('coordinador.grupos.index')
              ->with('success', 'Grupo eliminado exitosamente');
      }
  
      // Mostrar grupos eliminados
      public function trashed()
      {
          $grupos = Grupo::onlyTrashed()
                      ->with(['profesor', 'aula', 'horario'])
                      ->orderBy('deleted_at', 'desc')
                      ->get();
          
          return view('coordinador.grupos.eliminados', compact('grupos'));
      }
  
      // Restaurar grupo eliminado
      public function restore($id)
      {
          $grupo = Grupo::onlyTrashed()->findOrFail($id);
          $grupo->restore();
  
          return redirect()->route('coordinador.grupos.index')
              ->with('success', 'Grupo restaurado exitosamente');
      }
  
      // Eliminación permanente
      public function forceDelete($id)
      {
          $grupo = Grupo::onlyTrashed()->findOrFail($id);
          $grupo->forceDelete();
  
          return redirect()->route('coordinador.grupos.eliminados')
              ->with('success', 'Grupo eliminado permanentemente');
      }
  
  }