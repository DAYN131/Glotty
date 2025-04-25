<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos Inscritos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/script.js"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h1 class="text-xl font-semibold text-gray-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0l4.5 4.5M7.5 3v13.5m-3-3h13.5m0-13.5L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                </svg>
                Panel del Coordinador
            </h1>
            <p class="text-gray-600 text-sm">Gestión de alumnos inscritos y sus calificaciones.</p>
        </div>

        <div class="overflow-x-auto rounded-lg shadow-xl">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Alumno</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Grupo</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">1er Parcial</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">2do Parcial</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Final</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($inscripciones as $insc)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $insc->alumno->nombre_alumno }} {{ $insc->alumno->apellidos_alumno }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $insc->grupo->nivel_ingles }}-{{ $insc->grupo->letra_grupo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $insc->calificacion_parcial_1 ?? '--' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $insc->calificacion_parcial_2 ?? '--' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-700">{{ $insc->calificacion_final ?? '--' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>