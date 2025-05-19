<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Nueva paleta azul-verde
                        sidebar: '#0f172a',         // Azul oscuro profundo
                        header: '#1e293b',          // Azul oscuro
                        primary: {
                            light: '#7dd3fc',       // Azul cielo claro
                            DEFAULT: '#0ea5e9',     // Azul cielo vibrante
                            dark: '#0369a1'         // Azul cielo oscuro
                        },
                        secondary: {
                            light: '#86efac',       // Verde esmeralda claro
                            DEFAULT: '#10b981',     // Verde esmeralda
                            dark: '#047857'         // Verde esmeralda oscuro
                        },
                        accent: {
                            light: '#a5f3fc',       // Azul cian claro
                            DEFAULT: '#06b6d4',     // Azul cian
                            dark: '#0e7490'         // Azul cian oscuro
                        },
                        neutral: {
                            light: '#f8fafc',       // Blanco azulado muy claro
                            DEFAULT: '#f1f5f9',     // Gris muy claro
                            dark: '#e2e8f0'         // Gris claro
                        },
                        text: {
                            primary: '#1e293b',     // Azul oscuro para texto
                            secondary: '#64748b'    // Gris azulado para texto secundario
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                        'card': '0 2px 8px rgba(15, 23, 42, 0.08)',
                        'card-hover': '0 4px 12px rgba(15, 23, 42, 0.12)'
                    },
                    borderRadius: {
                        'xl': '12px',
                        '2xl': '16px'
                    }
                }
            }
        }
    </script>
    <style>
        /* Transiciones suaves */
        .transition-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Efecto hover para tarjetas */
        .card-hover:hover {
            transform: translateY(-2px);
        }
        
        /* Degradado sutil para el sidebar */
        .sidebar-gradient {
            background: linear-gradient(180deg, #0f172a 0%, #1e3a8a 100%);
        }
    </style>
</head>
<body class="bg-neutral-light min-h-screen flex flex-col font-sans antialiased text-text-primary">
    <div class="flex flex-1">
        <!-- Sidebar mejorado -->
        <div class="w-20 sidebar-gradient text-white min-h-screen flex flex-col items-center py-8 space-y-10 transition-smooth z-10">
            <!-- Logo/Icono con efecto hover -->
            <div class="rounded-full bg-primary-light/20 w-12 h-12 flex items-center justify-center border-2 border-primary-light/30 hover:bg-primary-light/40 transition-smooth">
                <i class="fas fa-user-tie text-primary-light text-xl"></i>
            </div>
            
            <!-- Menú principal -->
            <div class="flex flex-col items-center space-y-10 w-full">
                <a href="#" class="relative group w-full flex justify-center">
                    <i class="fas fa-home text-xl text-white/80 group-hover:text-primary-light transition-smooth"></i>
                    <span class="absolute left-full ml-4 bg-white text-sidebar px-2 py-1 rounded text-xs font-medium opacity-0 group-hover:opacity-100 transition-smooth shadow-md whitespace-nowrap">
                        Inicio
                    </span>
                </a>
                
                <a href="#" class="relative group w-full flex justify-center">
                    <i class="fas fa-user-graduate text-xl text-white/80 group-hover:text-primary-light transition-smooth"></i>
                    <span class="absolute left-full ml-4 bg-white text-sidebar px-2 py-1 rounded text-xs font-medium opacity-0 group-hover:opacity-100 transition-smooth shadow-md whitespace-nowrap">
                        Alumnos
                    </span>
                </a>
                
                <a href="#" class="relative group w-full flex justify-center">
                    <i class="fas fa-chalkboard-teacher text-xl text-white/80 group-hover:text-secondary transition-smooth"></i>
                    <span class="absolute left-full ml-4 bg-white text-sidebar px-2 py-1 rounded text-xs font-medium opacity-0 group-hover:opacity-100 transition-smooth shadow-md whitespace-nowrap">
                        Profesores
                    </span>
                </a>
                
                <a href="#" class="relative group w-full flex justify-center">
                    <i class="fas fa-calendar-alt text-xl text-white/80 group-hover:text-accent transition-smooth"></i>
                    <span class="absolute left-full ml-4 bg-white text-sidebar px-2 py-1 rounded text-xs font-medium opacity-0 group-hover:opacity-100 transition-smooth shadow-md whitespace-nowrap">
                        Calendario
                    </span>
                </a>
            </div>
            
            <!-- Menú inferior -->
            <div class="mt-auto">
                <a href="#" class="relative group w-full flex justify-center">
                    <i class="fas fa-sign-out-alt text-xl text-white/80 group-hover:text-red-400 transition-smooth"></i>
                    <span class="absolute left-full ml-4 bg-white text-sidebar px-2 py-1 rounded text-xs font-medium opacity-0 group-hover:opacity-100 transition-smooth shadow-md whitespace-nowrap">
                        Salir
                    </span>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header mejorado -->
            <header class="bg-header shadow-sm h-16 flex items-center px-8 border-b border-gray-200/10">
                <div class="flex items-center space-x-3">
                    <button class="text-white/80 hover:text-primary-light transition-smooth">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <nav class="flex space-x-4 text-sm">
                        <a href="#" class="text-white/80 hover:text-white flex items-center space-x-1 transition-smooth">
                            <i class="fas fa-home text-xs"></i>
                            <span>Inicio</span>
                        </a>
                    </nav>
                </div>
                <div class="ml-auto flex items-center space-x-6">
                    <span class="text-white font-semibold tracking-wide text-lg bg-primary-dark/30 px-4 py-1 rounded-full">
                        COORDINADOR ACADÉMICO
                    </span>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="flex-1 p-8 overflow-auto bg-neutral-light">
                <!-- Bienvenida y estadísticas -->
                <div class="mb-8">
                    <!-- Tarjeta de bienvenida -->
                    <div class="bg-gradient-to-r from-primary/10 to-accent/10 rounded-2xl shadow-soft p-6 mb-6 border border-gray-100">
                        <h2 class="text-2xl font-bold text-header mb-1">Bienvenido, {{ $nombre_completo }}</h2>
                        <p class="text-text-secondary mb-4">RFC: {{ $rfc_coordinador }}</p>
                        <div class="flex items-center text-sm text-text-secondary">
                            <i class="fas fa-calendar-day text-primary mr-2"></i>
                            <span>Hoy es {{ date('d/m/Y') }}</span>
                        </div>
                    </div>
                    
                    <!-- Estadísticas mejoradas -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
                        <!-- Tarjeta de Alumnos Activos -->
                        <div class="bg-white rounded-xl shadow-card p-5 flex items-center border border-gray-100 hover:shadow-card-hover transition-smooth card-hover">
                            <div class="p-3 bg-primary/10 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Alumnos activos</div>
                                <div class="font-bold text-2xl text-primary-dark">{{ $estadisticas['total_alumnos'] }}</div>
                                <div class="text-xs text-gray-400 mt-1">Inscripciones vigentes</div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta de Alumnos Reprobados -->
                        <div class="bg-white rounded-xl shadow-card p-5 flex items-center border border-gray-100 hover:shadow-card-hover transition-smooth card-hover">
                            <div class="p-3 bg-red-50 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Alumnos reprobados</div>
                                <div class="font-bold text-2xl text-red-600">{{ $estadisticas['reprobados'] }}</div>
                                <div class="text-xs text-gray-400 mt-1">
                                    {{ number_format($estadisticas['porcentaje_reprobacion'], 1) }}% del total
                                </div>
                            </div>
                        </div>
                        
                         <!-- Tarjeta de Alumnos Aprobados -->
                        <div class="bg-white rounded-xl shadow-card p-5 flex items-center border border-gray-100 hover:shadow-card-hover transition-smooth card-hover">
                            <div class="p-3 bg-green-50 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Alumnos aprobados</div>
                                <div class="font-bold text-2xl text-green-600">{{ $estadisticas['aprobados'] }}</div>
                                <div class="text-xs text-gray-400 mt-1">
                                    {{ number_format($estadisticas['porcentaje_aprobacion'], 1) }}% del total
                                </div>
                            </div>
                        </div>
                        
                     <!-- Tarjeta de Promedio General -->
                    <div class="bg-white rounded-xl shadow-card p-5 flex items-center border border-gray-100 hover:shadow-card-hover transition-smooth card-hover">
                        <div class="p-3 bg-blue-50 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Promedio general</div>
                            <div class="font-bold text-2xl text-blue-600">{{ number_format($estadisticas['promedio_general'], 1) }}</div>
                            <div class="text-xs text-gray-400 mt-1">
                                {{ $estadisticas['total_calificaciones'] }} calificaciones
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>

                <!-- Main Grid mejorado -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Tarjeta Inscripciones -->
                    <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-primary/10 rounded-lg mr-4 group-hover:bg-primary/20 transition-smooth">
                                <i class="fas fa-file-signature text-primary text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Inscripciones</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Aprueba las inscripciones de los alumnos y gestiona su proceso de admisión.</p>
                        <a href="{{route ('coordinador.inscripciones.index')}}" class="inline-flex items-center text-primary font-medium group-hover:text-primary-dark transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>

                    <!-- Tarjeta Grupos -->
                    <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-secondary/10 rounded-lg mr-4 group-hover:bg-secondary/20 transition-smooth">
                                <i class="fas fa-users-between-lines text-secondary text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Grupos</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Gestiona los grupos académicos y la asignación de alumnos a cada grupo.</p>
                        <a href="{{ route('coordinador.grupos.index') }}" class="inline-flex items-center text-secondary font-medium group-hover:text-secondary-dark transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                    
                    <!-- Tarjeta Profesores -->
                    <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-green-100/50 rounded-lg mr-4 group-hover:bg-green-100/70 transition-smooth">
                                <i class="fas fa-chalkboard-user text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Profesores</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Administra la plantilla docente y las asignaciones de cursos a profesores.</p>
                        <a href="{{ route('coordinador.profesores') }}" class="inline-flex items-center text-green-600 font-medium group-hover:text-green-700 transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>


                                      <!-- Tarjeta Alumnos -->
                                      <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-blue-100/50 rounded-lg mr-4 group-hover:bg-blue-100/70 transition-smooth">
                                <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Alumnos</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Administra la información de los alumnos registrados en el sistema.</p>
                        <a href="{{route ('coordinador.inscripciones.aprobadas')}}" class="inline-flex items-center text-blue-600 font-medium group-hover:text-blue-700 transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                    
                    <!-- Tarjeta Horarios -->
                    <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-purple-100/50 rounded-lg mr-4 group-hover:bg-purple-100/70 transition-smooth">
                                <i class="fas fa-calendar-days text-purple-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Horarios</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Administra los horarios de clases y la disponibilidad de aulas.</p>
                        <a href="{{ route('coordinador.horarios.index') }}" class="inline-flex items-center text-purple-600 font-medium group-hover:text-purple-700 transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                    
                    <!-- Tarjeta Documentos -->
                    <div class="bg-white p-6 rounded-2xl shadow-card hover:shadow-card-hover transition-smooth border border-gray-100 card-hover group">
                        <div class="flex items-center mb-5">
                            <div class="p-3 bg-amber-100/50 rounded-lg mr-4 group-hover:bg-amber-100/70 transition-smooth">
                                <i class="fas fa-folder-open text-amber-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-header">Constancias</h3>
                        </div>
                        <p class="text-text-secondary mb-5">Gestiona documentos académicos y administrativos del sistema.</p>
                        <a href="{{ route('constancias.mostrar-subir') }}" class="inline-flex items-center text-amber-600 font-medium group-hover:text-amber-700 transition-smooth">
                            Acceder
                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>

  
            </div>
        </div>
    </div>
    
    <!-- Footer mejorado -->
    <footer class="bg-header text-white py-4 px-8 border-t border-gray-200/10">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-primary-light"></i>
                </div>
                <span class="font-medium">Sistema Académico Glotty</span>
            </div>
            <div class="text-sm text-white/80">
                &copy; 2023 Empresa Datalinker. Todos los derechos reservados.
            </div>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="text-white/60 hover:text-white transition-smooth">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white/60 hover:text-white transition-smooth">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white/60 hover:text-white transition-smooth">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </footer>


    <!-- Script para interactividad -->
    <script>
        // Tooltips para el sidebar
        document.querySelectorAll('.sidebar a').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const tooltip = this.querySelector('span');
                tooltip.classList.remove('opacity-0');
                tooltip.classList.add('opacity-100');
            });
            
            item.addEventListener('mouseleave', function() {
                const tooltip = this.querySelector('span');
                tooltip.classList.remove('opacity-100');
                tooltip.classList.add('opacity-0');
            });
        });

        // Toggle sidebar (ejemplo)
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar-gradient');
            sidebar.classList.toggle('w-20');
            sidebar.classList.toggle('w-64');
        });
    </script>
</body>
</html>