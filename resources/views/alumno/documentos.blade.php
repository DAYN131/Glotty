<div class="container">
    <h3>Mis Documentos</h3>
    
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Constancia de Finalización</h5>
            
            @if(Storage::disk('sftp')->exists("constancias/{$alumno->numero_control}.pdf"))
                <a href="{{ route('constancias.descargar', $alumno->numero_control) }}" 
                   class="btn btn-success">
                   <i class="fas fa-download"></i> Descargar
                </a>
            @else
                <div class="alert alert-warning">
                    Tu constancia aún no está disponible.
                </div>
            @endif
        </div>
    </div>
</div>