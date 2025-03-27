<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar': '#1e40af', // Azul más oscuro y vibrante para la barra lateral
                        'primary': '#3b82f6', // Azul principal para botones
                        'primary-dark': '#2563eb', // Versión más oscura para hover
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="w-16 bg-sidebar text-white min-h-screen flex flex-col items-center py-6 space-y-8 shadow-lg">
            <div class="rounded-full bg-blue-500 w-10 h-10 flex items-center justify-center shadow-md">
                <i class="fas fa-user-tie text-white"></i>
            </div>
            <div class="flex flex-col items-center space-y-8">
                <a href="#" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-home text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-user-graduate text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-calendar-alt text-xl"></i>
                </a>
            </div>
            <div class="mt-auto">
                <a href="#" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Header -->
            <header class="bg-white shadow h-16 flex items-center px-6 border-b border-gray-200">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-bars text-gray-600"></i>
                    <a href="#" class="text-gray-700 hover:text-primary transition-colors flex items-center">
                        <i class="fas fa-home text-sm"></i>
                        <span class="ml-1">Inicio</span>
                    </a>
                </div>
                <div class="ml-auto flex items-center">
                    <span class="text-gray-800 font-semibold">COORDINADOR ACADÉMICO</span>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto">
                <div class="bg-white rounded-lg shadow p-6 mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3 border-gray-200">Lista de Profesores</h2>
                    
                    <!-- Botón para agregar profesor -->
                    <a href="{{ route('registrar.profesor') }}" class="block w-full bg-primary hover:bg-primary-dark text-white py-3 rounded-md transition-colors text-center mb-6 font-medium shadow-md">
                        Agregar Profesor <i class="fas fa-plus ml-1"></i>
                    </a>

                    <!-- Tabla de profesores -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Nombre</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Correo</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-semibold text-gray-700">Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profesores as $profesor)
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="px-6 py-4 border-b border-gray-200 text-gray-800">{{ $profesor->nombre_profesor }}  {{ $profesor->apellidos_profesor }} </td>
                                        <td class="px-6 py-4 border-b border-gray-200 text-gray-800">{{ $profesor->correo_profesor }}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 text-gray-800">{{ $profesor->num_telefono }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer con copyright -->
    <footer class="bg-white text-center py-4 text-gray-600 border-t border-gray-200 shadow-inner">
        &copy; Empresa Datalinker 2025
    </footer>
</body>
</html>