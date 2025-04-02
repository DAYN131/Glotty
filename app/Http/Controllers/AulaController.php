<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AulaController extends Controller
{
    
    public function index()
    {
    $aulas = Aula::orderBy('edificio')
                ->orderBy('numero_aula')
                ->get();
    
    return view('coordinador.aulas.index', compact('aulas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'edificio' => 'required|string|max:1',
            'numero_aula' => 'required|integer|min:1',
            'capacidad' => 'required|integer|min:1',
            'tipo_aula' => 'required|in:regular,laboratorio,multimedia,conferencia' 
        ]);


        
        // Elimina la validación de id_aula si no la usas
        Aula::create([
            'edificio' => $validatedData['edificio'],
            'numero_aula' => $validatedData['numero_aula'],
            'capacidad' => $validatedData['capacidad'],
            'tipo_aula' => $validatedData['tipo_aula'] 
        ]);

         // Asegúrate que esta línea esté exactamente así:
         return redirect()->route('coordinador.aulas.index')->with('success', 'Aula creada exitosamente');
    }

    public function create()
    {
        return view('coordinador.aulas.create');
    }
}