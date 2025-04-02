<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Grupo - Glotty</title>
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
                <i class="fas fa-user-tie text-white"></i>
            </div>
            <div class="flex flex-col items-center space-y-8">
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-home text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-user-graduate text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
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
                    <span class="text-gray-400 mx-2">/</span>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <span>Gestión de Grupos</span>
                    </a>
                    <span class="text-gray-400 mx-2">/</span>
                    <span class="text-gray-600">Crear Nuevo Grupo</span>
                </div>
                <div class="ml-auto flex items-center">
                    <span class="text-gray-700 font-medium">COORDINADOR ACADÉMICO</span>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto">
                <!-- Form Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 max-w-4xl mx-auto">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Crear Nuevo Grupo</h1>
                    
                    <form action="#" method="POST">
                        <!-- Primera fila: Nivel y Letra -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nivel_ingles" class="block text-sm font-medium text-gray-700 mb-1">Nivel de Inglés</label>
                                <select id="nivel_ingles" name="nivel_ingles" required 
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                    <option value="1">Nivel 1</option>
                                    <option value="2">Nivel 2</option>
                                    <option value="3">Nivel 3</option>
                                    <option value="4">Nivel 4</option>
                                    <option value="5">Nivel 5</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="letra_grupo" class="block text-sm font-medium text-gray-700 mb-1">Letra de Grupo</label>
                                <input type="text" id="letra_grupo" name="letra_grupo" maxlength="1" required placeholder="Ej: A, B, C"
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                            </div>
                        </div>
                        
                        <!-- Segunda fila: Año y Periodo -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="anio" class="block text-sm font-medium text-gray-700 mb-1">Año</label>
                                <select id="anio" name="anio" required
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="periodo" class="block text-sm font-medium text-gray-700 mb-1">Periodo</label>
                                <select id="periodo" name="periodo" required
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                    <option value="Enero-Abril">Enero-Abril</option>
                                    <option value="Mayo-Agosto">Mayo-Agosto</option>
                                    <option value="Septiembre-Diciembre">Septiembre-Diciembre</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Tercera fila: Profesor -->
                        <div class="mb-6">
                            <label for="profesor_id" class="block text-sm font-medium text-gray-700 mb-1">Profesor</label>
                            <select id="profesor_id" name="profesor_id" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                <option value="">Seleccione un profesor</option>
                                <option value="1">Carlos Rodríguez López</option>
                                <option value="2">María González Pérez</option>
                                <option value="3">Roberto Sánchez Díaz</option>
                                <option value="4">Laura Martínez Ruiz</option>
                                <option value="5">Javier López Torres</option>
                            </select>
                        </div>
                        
                        <!-- Cuarta fila: Aula y Horario -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="aula_id" class="block text-sm font-medium text-gray-700 mb-1">Aula</label>
                                <select id="aula_id" name="aula_id" required
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                    <option value="">Seleccione un aula</option>
                                    <option value="1">A-101</option>
                                    <option value="2">A-205</option>
                                    <option value="3">B-102</option>
                                    <option value="4">B-203</option>
                                    <option value="5">C-105</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="horario_id" class="block text-sm font-medium text-gray-700 mb-1">Horario</label>
                                <select id="horario_id" name="horario_id" required
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                                    <option value="">Seleccione un horario</option>
                                    <option value="1">09:00 - 11:00</option>
                                    <option value="2">11:00 - 13:00</option>
                                    <option value="3">15:00 - 17:00</option>
                                    <option value="4">17:00 - 19:00</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Quinta fila: Capacidad máxima y Cupo mínimo -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="capacidad_maxima" class="block text-sm font-medium text-gray-700 mb-1">Capacidad Máxima</label>
                                <input type="number" id="capacidad_maxima" name="capacidad_maxima" min="1" max="50" value="30" required
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                            </div>
                            
                            <div>
                                <label for="cupo_minimo" class="block text-sm font-medium text-gray-700 mb-1">Cupo Mínimo</label>
                                <input type="number" id="cupo_minimo" name="cupo_minimo" min="1" max="20" value="10" required
                                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border">
                            </div>
                        </div>
                        
                        <!-- Botones de acción -->
                        <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                            <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition-colors text-center">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded-md transition-colors text-center">
                                Guardar Grupo
                            </button>
                        </div>
                    </form>
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