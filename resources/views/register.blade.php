<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Glotty</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-700 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-sm w-full text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Regístrate en Glotty</h2>

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

        <!-- Formulario de registro -->
        <form action="/register" method="POST" class="space-y-4">
            @csrf <!-- Token CSRF para protección -->

            <!-- Campo: Nombre -->
            <input 
                type="text" 
                name="nombre_alumno" 
                placeholder="Nombre" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('nombre_alumno') }}" <!-- Mantener el valor ingresado después de un error -->
            >

            <!-- Campo: Apellidos -->
            <input 
                type="text" 
                name="apellidos_alumno" 
                placeholder="Apellidos" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('apellidos_alumno') }}" <!-- Mantener el valor ingresado después de un error -->
            >

            <!-- Campo: Número de Control -->
            <input 
                type="text" 
                name="no_control" 
                placeholder="Número de Control" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('no_control') }}" <!-- Mantener el valor ingresado después de un error -->
            >

            <!-- Campo: Carrera -->
            <input 
                type="text" 
                name="carrera" 
                placeholder="Carrera" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('carrera') }}" <!-- Mantener el valor ingresado después de un error -->
            >

            <!-- Campo: Correo Institucional -->
            <input 
                type="email" 
                name="correo_institucional" 
                placeholder="Correo Institucional" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('correo_institucional') }}" <!-- Mantener el valor ingresado después de un error -->
            >

            <!-- Campo: Contraseña -->
            <input 
                type="password" 
                name="password" 
                placeholder="Contraseña" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            >

            <!-- Campo: Confirmar Contraseña -->
            <input 
                type="password" 
                name="password_confirmation" 
                placeholder="Confirmar Contraseña" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
            >

            <!-- Botón: Registrarse -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold"
            >
                Registrarse
            </button>
        </form>

        <!-- Enlace: Iniciar Sesión -->
        <p class="text-gray-600 mt-4">
            ¿Ya tienes cuenta? 
            <a href="/login" class="text-purple-500 hover:underline">Inicia Sesión</a