<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Profesor - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        'primary-dark': '#2563EB',
                        sidebar: '#1E3A8A',
                        accent: '#60A5FA'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="w-16 bg-sidebar text-white min-h-screen flex flex-col items-center py-6 space-y-8">
            <div class="rounded-full bg-accent w-10 h-10 flex items-center justify-center">
                <i class="fas fa-user-tie text-white"></i>
            </div>
            <div class="flex flex-col items-center space-y-8">
                <a href="#" class="text-white hover:text-accent transition-colors">
                    <i class="fas fa-home text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-accent transition-colors">
                    <i class="fas fa-user-graduate text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-accent transition-colors">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-accent transition-colors">
                    <i class="fas fa-calendar-alt text-xl"></i>
                </a>
            </div>
            <div class="mt-auto">
                <a href="#" class="text-white hover:text-accent transition-colors">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center px-6 border-b border-blue-100">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-bars text-primary"></i>
                    <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                        <i class="fas fa-home text-sm"></i>
                        <span class="ml-1">Inicio</span>
                    </a>
                </div>
                <div class="ml-auto flex items-center">
                    <span class="text-primary font-medium">COORDINADOR ACADÉMICO</span>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto">
                <div class="bg-white rounded-lg shadow-sm p-6 mb-4 border border-blue-100">
                    <h2 class="text-lg font-medium text-primary mb-4 border-b border-blue-100 pb-2">Registrar Profesor</h2>
                    
                    <!-- Formulario de registro de profesores -->
                    <form action="{{ route('registrar.profesor.post') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Campo: RFC -->
                        <input 
                            type="text" 
                            name="rfc_profesor" 
                            placeholder="RFC" 
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                        <!-- Campo: Nombre -->
                        <input 
                            type="text" 
                            name="nombre_profesor" 
                            placeholder="Nombre" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Campo: Apellidos -->
                               <input 
                            type="text" 
                            name="apellidos_profesor" 
                            placeholder="Apellidos" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Campo: Correo Electrónico -->
                        <input 
                            type="email" 
                            name="correo_profesor" 
                            placeholder="Correo Electrónico" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Campo: Número de Teléfono -->
                        <input 
                            type="text" 
                            name="num_telefono" 
                            placeholder="Número de Teléfono" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Campo: Contraseña -->
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Contraseña" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Campo: Confirmar Contraseña -->
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="Confirmar Contraseña" 
                            class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required
                        >

                        <!-- Botón: Registrar Profesor -->
                        <button 
                            type="submit" 
                            class="w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors shadow-sm"
                        >
                            Registrar Profesor
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer con copyright -->
    <footer class="bg-white text-center py-3 text-primary border-t border-blue-100">
        &copy; Empresa Datalinker 2025
    </footer>
</body>
</html>