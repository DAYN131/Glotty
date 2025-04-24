<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Estudiante - Glotty</title>
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
                <i class="fas fa-user-graduate text-white"></i>
            </div>
            <div class="flex flex-col items-center space-y-8">
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-home text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-book text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-graduation-cap text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-user text-xl"></i>
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
                    <span class="text-gray-700 font-medium">JUAN PÉREZ GARCÍA</span>
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
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Créditos acumulados</div>
                                    <div class="font-bold text-xl">138</div>
                                </div>
                            </div>
                            
                            <div class="bg-red-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-red-500 rounded text-white mr-4">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Materias reprobadas</div>
                                    <div class="font-bold text-xl">0</div>
                                </div>
                            </div>
                            
                            <div class="bg-green-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-green-500 rounded text-white mr-4">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Materias aprobadas</div>
                                    <div class="font-bold text-xl">30</div>
                                </div>
                            </div>
                            
                            <div class="bg-yellow-100 rounded-lg p-4 flex">
                                <div class="p-2 bg-yellow-500 rounded text-white mr-4">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Promedio general</div>
                                    <div class="font-bold text-xl">95.300</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Información del Estudiante -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="col-span-2">
                            <div class="text-sm text-gray-500"></div>
                            
                            <!-- Mostrar nombre completo -->
                            <span class="text-gray-700 font-medium">{{ session('user_name') }}</span>

                            <!-- Mostrar iniciales -->
                            <div class="user-avatar rounded-full w-8 h-8 flex items-center justify-center text-white">
                                {{ session('user_initials') }}
                            </div>

                            <!-- Mostrar mensaje personalizado -->
                            <h1 class="text-2xl font-bold">Bienvenido, {{ explode(' ', session('user_name'))[0] }}!</h1>



                            <div class="text-gray-600 mb-3">Ingeniería en Sistemas Computacionales</div>
                            
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                                    <span>Semestre: 6</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users text-gray-400 mr-2"></i>
                                    <span>Grupo: A</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-building text-gray-400 mr-2"></i>
                                    <span>Sede: Principal</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle text-gray-400 mr-2"></i>
                                    <span>Estatus: Vigente Reinscrito</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="w-32 h-40 bg-gray-200 rounded-lg overflow-hidden">
                                <img src="/placeholder.svg?height=160&width=128" alt="Foto del estudiante" class="w-full h-full object-cover" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Historial de Cursos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-history text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Historial de Cursos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta tu historial académico y materias aprobadas.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Calificaciones Actuales -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-chart-line text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Calificaciones Actuales</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Revisa tus calificaciones del semestre en curso.</p>
                        <a href="{{ route('alumno.calificaciones.index') }}" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Inscripción -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-edit text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Inscripción</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Realiza tu proceso de inscripción para el próximo semestre.</p>
                        <a href="{{ route('alumno.inscripciones.index') }}" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Datos Personales -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-user-cog text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Datos Personales</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Actualiza tu información personal y datos de contacto.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Constancia de Finalización -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-file-download text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Constancia de Finalización</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Descarga tu constancia de finalización de estudios.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Descargar <i class="fas fa-download ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Horario -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-calendar-alt text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Horario</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta tu horario de clases del semestre actual.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Kardex -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-clipboard-list text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Kardex</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta tu historial académico completo.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Pagos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-money-bill-wave text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Pagos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Consulta el estado de tus pagos y colegiaturas.</p>
                        <a href="#" class="block w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors text-center">
                            Acceder <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <!-- Documentos -->
                    <div class="bg-white p-5 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-folder-open text-primary mr-3 text-xl"></i>
                            <h3 class="text-lg font-medium text-gray-700">Documentos</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Sube y gestiona tus documentos digitales.</p>
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