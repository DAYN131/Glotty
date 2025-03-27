<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Profesor; // Importa el modelo Profesor

Route::get('/', function () {
   return view('login');
});

// Ruta para mostrar el formulario de login (GET)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para mostrar el formulario de registro de alumnos (GET)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Ruta para procesar el registro de alumnos (POST)
Route::post('/register', [AuthController::class, 'register']);

// Rutas para la vista del alumno

//Panel de Control del Alumno
Route::get('/alumno', function () {
    return view('alumno');
})->name('alumno.dashboard'); // Asignar un nombre a la ruta


// Rutas para la vista del profesor

//Panel del Profesor
Route::get('/profesor', function () {
    return view('profesor');
});//->middleware('auth:profesor'); // Solo accesible para profesores autenticados

// Rutas para la vista del coordinador

//Panel de Control del Coordinador
Route::get('/coordinador', function () {
    return view('coordinador');
})->middleware('auth:coordinador'); // Solo accesible para coordinadores autenticados

// Ruta para obtener todos los profesores
Route::get('/coordinador/profesores', function () {
    $profesores = Profesor::all(); // Obtener todos los profesores
    return view('coordinador.profesores', compact('profesores'));
})->middleware('auth:coordinador')->name('coordinador.profesores');

// Ruta para el formulario de registro de profesores (solo accesible para coordinadores)
Route::get('/coordinador/registrar-profesor', function () {
    return view('coordinador.registrar-profesor');
})->middleware('auth:coordinador')->name('registrar.profesor');

// Ruta para procesar el registro de profesores (solo accesible para coordinadores)
Route::post('/coordinador/registrar-profesor', [AuthController::class, 'registerProfesor'])
    ->middleware('auth:coordinador')
    ->name('registrar.profesor.post');
