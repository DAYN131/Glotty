<!DOCTYPE html>
<html>
<head>
    <title>Subir Constancia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Subir Constancia de Finalización</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('constancias.subir') }}" method="POST" enctype="multipart/form-data">
            @csrf
         
            <div class="mb-3">
                <label class="form-label">Número de Control del Alumno:</label>
                <select name="no_control" class="form-select" required>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->no_control }}">
                            {{ $alumno->no_control }} - {{ $alumno->nombre_alumno }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Archivo PDF:</label>
                <input type="file" name="file" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Constancia</button>
        </form>

        <hr>
        
       
    </div>
</body>
</html>