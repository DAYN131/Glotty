<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Inscripciones - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sidebar: '#2c3e50',
                        primary: {
                            light: '#3498db',
                            DEFAULT: '#2980b9',
                            dark: '#1f6ca6'
                        },
                        secondary: {
                            light: '#f8fafc',
                            DEFAULT: '#f1f5f9',
                            dark: '#e2e8f0'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex-1 p-6 max-w-7xl mx-auto">
        <!-- Encabezado de la página -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Mis Inscripciones</h1>
                <p class="text-gray-600">Gestiona tus inscripciones a cursos de idiomas</p>
            </div>
            
            <div class="mt-4 md:mt-0">
                <a href="{{ route('alumno.inscripciones.create') }}" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md flex items-center transition-colors">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Inscribirse
                </a>
            </div>
        </div>
        
        <!-- Resumen de inscripciones -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 flex items-center">
                <div class="p-3 bg-blue-100 rounded-full text-blue-600 mr-4">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total de inscripciones</p>
                    <p class="text-xl font-semibold text-gray-800">{{ $inscripciones->count() }}</p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 flex items-center">
                <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Aprobadas</p>
                    <p class="text-xl font-semibold text-gray-800">{{ $inscripciones->where('estatus_inscripcion', 'Aprobada')->count() }}</p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full text-yellow-600 mr-4">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Pendientes</p>
                    <p class="text-xl font-semibold text-gray-800">{{ $inscripciones->where('estatus_inscripcion', 'Pendiente')->count() }}</p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 flex items-center">
                <div class="p-3 bg-red-100 rounded-full text-red-600 mr-4">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Rechazadas</p>
                    <p class="text-xl font-semibold text-gray-800">{{ $inscripciones->where('estatus_inscripcion', 'Rechazada')->count() }}</p>
                </div>
            </div>
        </div>
        
        <!-- Tabla de inscripciones -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <div class="p-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <h2 class="font-semibold text-gray-700 flex items-center">
                    <i class="fas fa-history mr-2 text-primary"></i>
                    Historial de Inscripciones
                </h2>
                <div class="flex items-center space-x-2">
                    <button class="text-gray-500 hover:text-gray-700 p-1">
                        <i class="fas fa-filter"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700 p-1">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Periodo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Grupo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nivel
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Horario
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estatus
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($inscripciones as $inscripcion)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $inscripcion->periodo }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $inscripcion->grupo->nivel_ingles }}-{{ $inscripcion->grupo->letra_grupo }}
                                </div>
                                <div class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class="fas fa-user-tie mr-1"></i>
                                    Prof: {{ $inscripcion->grupo->profesor->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap mr-2 text-primary"></i>
                                    {{ $inscripcion->nivel_solicitado }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="far fa-clock mr-2 text-gray-400"></i>
                                    {{ $inscripcion->grupo->horario->descripcion }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($inscripcion->estatus_inscripcion == 'Aprobada')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i> Aprobada
                                    </span>
                                @elseif($inscripcion->estatus_inscripcion == 'Pendiente')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i> Pendiente
                                    </span>
                                @elseif($inscripcion->estatus_inscripcion == 'Rechazada')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i> Rechazada
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        {{ $inscripcion->estatus_inscripcion }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($inscripcion->estatus_inscripcion == 'Pendiente')
                                    <form action="{{ route('alumno.inscripciones.destroy', $inscripcion) }}" method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1 rounded-md flex items-center transition-colors" onclick="return confirm('¿Estás seguro de cancelar esta inscripción?')">
                                            <i class="fas fa-ban mr-1"></i>
                                            Cancelar
                                        </button>
                                    </form>
                                @elseif($inscripcion->estatus_inscripcion == 'Aprobada')
                                    <a href="#" class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1 rounded-md flex items-center transition-colors">
                                        <i class="fas fa-eye mr-1"></i>
                                        Detalles
                                    </a>
                                @else
                                    <span class="text-gray-400 px-3 py-1">
                                        <i class="fas fa-minus-circle mr-1"></i>
                                        N/A
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-clipboard-list text-4xl text-gray-300 mb-3"></i>
                                    <p>No tienes inscripciones registradas</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación (si es necesaria) -->
            @if(isset($inscripciones) && method_exists($inscripciones, 'links') && $inscripciones->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $inscripciones->links() }}
            </div>
            @endif
        </div>
        
        <!-- Información adicional -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Recuerda que puedes cancelar tus inscripciones pendientes, pero una vez aprobadas o rechazadas no podrás modificarlas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>