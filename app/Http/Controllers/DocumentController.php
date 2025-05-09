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
         // Verifica que el usuario sea alumno y tenga relación
        if (auth()->guard('alumno')->check()) {
            $alumno = auth()->guard('alumno')->user();
            return view('alumno.documentos.index', compact('alumno'));
        }
        
        return redirect('/')->with('error', 'Acceso no autorizado');
    }

    

    public function descargarConstancia($no_control)
    {
        // Verifica autenticación y coincidencia de no_control
        $alumnoAuth = auth()->guard('alumno')->user();
        if (!$alumnoAuth || $alumnoAuth->no_control != $no_control) {
            abort(403, 'Acceso no autorizado');
        }

        $ruta = "constancias/{$no_control}.pdf";
        
        if (Storage::disk('sftp')->exists($ruta)) {
            // Descarga directa con nombre personalizado
            return Storage::disk('sftp')->download($ruta, "constancia_{$no_control}.pdf");
        }

        return back()->with('error', 'La constancia no está disponible');
    }
    
}