<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // Mostrar formulario de subida (Coordinador)
    public function mostrarFormularioSubida()
    {
        $alumnos = Alumno::all();
        return view('coordinador.constancias.subir', compact('alumnos'));
    }

    public function subirConstancia(Request $request)
    {
        $request->validate([
            'no_control' => 'required|exists:alumnos,no_control',
            'file' => 'required|mimes:pdf|max:2048'
        ]);
    
        try {
            $ruta = $request->file('file')->storeAs(
                'constancias',
                $request->no_control . '.pdf',  // Ej: "20230001.pdf"
                'sftp'
            );
    
            return back()->with('success', 'Constancia subida exitosamente!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function mostrarDocumentos()
    {
        $alumno = auth()->user()->alumno;
        return view('alumno.documentos', compact('alumno'));
    }

    

    public function descargarConstancia($numero_control)
    {
        $ruta = "constancias/{$no_control}.pdf";
    
    if (Storage::disk('sftp')->exists($ruta)) {
        $url = "http://tu-ip:8080/{$ruta}";
        return redirect()->away($url);
    }

    return back()->with('error', 'El archivo no existe');
    }
}