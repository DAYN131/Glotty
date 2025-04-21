<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-700 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-sm w-full text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Iniciar Sesión en Glotty</h2>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de login -->
        <form action="/login" method="POST" class="space-y-4">
            @csrf <!-- Token CSRF para protección -->


                 <!-- Mantener el valor ingresado después de un error  -->
            <!-- Campo: Correo Electrónico -->
            <input 
                type="email" 
                name="email" 
                placeholder="Correo Electrónico" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('email') }}" >
       
            

            <!-- Campo: Contraseña -->
            <input 
                type="password" 
                name="password" 
                placeholder="Contraseña" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            >

            <!-- Campo: Rol -->
            <select 
                name="role" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            >
                <option value="alumno">Alumno</option>
                <option value="profesor">Profesor</option>
                <option value="coordinador">Coordinador</option>
            </select>

            <!-- Botón: Iniciar Sesión -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold"
            >
                Iniciar Sesión
            </button>
        </form>

        <!-- Enlace: Registrarse -->
        <p class="text-gray-600 mt-4">
            ¿No tienes cuenta? 
            <a href="/register" class="text-purple-500 hover:underline">Regístrate</a>
        </p>
    </div>
</body>
</html>