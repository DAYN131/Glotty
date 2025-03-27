<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Profesor - Glotty</title>
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
    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="w-16 bg-sidebar text-white min-h-screen flex flex-col items-center py-6 space-y-8">
            <div class="rounded-full bg-blue-400 w-10 h-10 flex items-center justify-center">
                <i class="fas fa-chalkboard-teacher text-white"></i>
            </div>
            <div class="flex flex-col items-center space-y-8">
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-home text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-users text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-book text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-calendar-alt text-xl"></i>
                </a>
            </div>
            <div class="mt-auto">
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center px-6 border-b">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-bars text-gray-500"></i>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-home text-sm"></i>
                        <span class="ml-1">Inicio</span>
                    </a>
                </div>
                <div class="ml-auto flex items-center">
                    <span class="text-gray-700 font-medium"></span>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto">
                <!-- Panel Principal Section -->
                <div class="mb-8">
                    <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
                        <h2 class="text-lg font-medium text-gray-700 mb-4 border-b pb-2">Panel Principal</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <!-- Estadísticas -->
                            <div class="bg-blue-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-blue-500 rounded text-white mr-4">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Grupos asignados</div>
                                    <div class="font-bold text-xl">5</div>
                                </div>
                            </div>
                            
                            <div class="bg-green-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-green-500 rounded text-white mr-4">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Total de alumnos</div>
                                    <div class="font-bold text-xl">127</div>
                                </div>
                            </div>
                            
                            <div class="bg-yellow-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-yellow-500 rounded text-white mr-4">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Materias impartidas</div>
                                    <div class="font-bold text-xl">3</div>
                                </div>
                            </div>
                            
                            <div class="bg-purple-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-purple-500 rounded text-white mr-4">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Horas semanales</div>
                                    <div class="font-bold text-xl">24</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Información del Profesor -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="col-span-2">
                            <div class="text-sm text-gray-500">Número de empleado: 10023456</div>
                            <h2 class="text-xl font-bold text-gray-800 mb-1">DR. CARLOS RODRÍGUEZ LÓPEZ</h2>
                            <div class="text-gray-600 mb-3">Departamento de Ciencias Computacionales</div>
                            
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap text-gray-400 mr-2"></i>
                                    <span>Grado: Doctor en Ciencias</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-building text-gray-400 mr-2"></i>
                                    <span>Sede: Campus Principal</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                    <span>carlos.rodriguez@glotty.edu</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-gray-400 mr-2"></i>
                                    <span>Ext. 2345</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-32 h-40 bg-gray-200 rounded-lg overflow-hidden">
                                <img src="/placeholder.svg?height=160&width=128" alt="Foto del profesor" class="w-full h-full object-cover" />
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Main Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Mis Grupos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-users text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Mis Grupos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Visualiza todos los grupos asignados a tu carga académica.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Asignar Calificaciones -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-edit text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Asignar Calificaciones</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Registra y actualiza las calificaciones de tus alumnos.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Lista de Alumnos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-user-graduate text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Lista de Alumnos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta la información detallada de tus estudiantes.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Control de Asistencia -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-clipboard-check text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Control de Asistencia</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Registra y gestiona la asistencia de tus alumnos.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Material Didáctico -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-book-open text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Material Didáctico</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Sube y comparte material educativo con tus alumnos.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Calendario Académico -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-calendar-alt text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Calendario Académico</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta fechas importantes del calendario escolar.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Mensajes -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-envelope text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Mensajes</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Comunícate con tus alumnos y otros profesores.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Reportes Académicos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-chart-bar text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Reportes Académicos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Genera reportes de rendimiento y estadísticas.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Horario -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-clock text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Mi Horario</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta tu horario de clases completo.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer con copyright -->
    <footer class="bg-white text-center py-3 text-gray-600 border-t">
        &copy; Empresa Datalinker 2025
    </footer>
</body>
</html>