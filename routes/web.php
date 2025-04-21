<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Profesor; // Importa el modelo Profesor
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\HorarioController;

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


// Grupos
Route::prefix('coordinador/grupos')->group(function () {
     Route::get('/', [GrupoController::class, 'index'])->name('coordinador.grupos.index');
     Route::get('/crear', [GrupoController::class, 'create'])->name('coordinador.grupos.crear');
     Route::post('/', [GrupoController::class, 'store'])->name('coordinador.grupos.guardar');
     Route::get('/{id}/editar', [GrupoController::class, 'edit'])->name('coordinador.grupos.edit');
     Route::put('/{id}', [GrupoController::class, 'update'])->name('coordinador.grupos.update');
     Route::delete('/{id}', [GrupoController::class, 'destroy'])->name('coordinador.grupos.destroy');
     
     // Rutas para eliminados
     Route::get('/eliminados', [GrupoController::class, 'trashed'])->name('coordinador.grupos.eliminados');
     Route::patch('/{id}/restaurar', [GrupoController::class, 'restore'])->name('coordinador.grupos.restore');
     Route::delete('/{id}/forzar-eliminacion', [GrupoController::class, 'forceDelete'])->name('coordinador.grupos.forceDelete');


 });



// * * *  RUTAS PARA AULAS  *** //
Route::get('/coordinador/aulas', [AulaController::class, 'index'])
     ->middleware('auth:coordinador')
     ->name('coordinador.aulas.index'); // Nombre completo de la ruta

Route::get('/coordinador/aulas/crear', [AulaController::class, 'create'])
->middleware('auth:coordinador')
->name('coordinador.aulas.crear');

Route::post('/coordinador/aulas/', [AulaController::class, 'store'])
->middleware('auth:coordinador')
->name('coordinador.aulas.guardar');


// Mostrar formulario de edición
Route::get('/coordinador/aulas/{id_aula}/editar', [AulaController::class, 'edit'])
     ->middleware('auth:coordinador')
     ->name('coordinador.aulas.editar');

// Actualizar aula (PUT)
Route::put('/coordinador/aulas/{id_aula}', [AulaController::class, 'update'])
     ->middleware('auth:coordinador')
     ->name('coordinador.aulas.actualizar');

     // Eliminar aula (DELETE)
Route::delete('/coordinador/aulas/{id_aula}/', [AulaController::class, 'destroy'])
     ->middleware('auth:coordinador')
     ->name('coordinador.aulas.eliminar');


// * * *  RUTAS PARA HORARIOS  *** //

Route::get('/coordinador/horarios', [HorarioController::class, 'index'])
     ->middleware('auth:coordinador')
     ->name('coordinador.horarios.index'); // Nombre completo de la ruta
    
Route::get('/coordinador/horarios/crear', [HorarioController::class, 'create'])
->middleware('auth:coordinador')
->name('coordinador.horarios.crear');

Route::get('/coordinador/horarios/{id}/editar', [HorarioController::class, 'edit'])
     ->middleware('auth:coordinador')
     ->name('coordinador.horarios.editar');

Route::post('/coordinador/horarios', [HorarioController::class, 'store'])
     ->name('coordinador.horarios.guardar');

Route::put('/{horario}', [HorarioController::class, 'update'])->name('coordinador.horarios.actualizar');

// Eliminación (soft delete)
Route::delete('/coordinador/horarios/{horario}', [HorarioController::class, 'destroy'])
->name('coordinador.horarios.eliminar');

// ver horarios eliminados
Route::get('/coordinador/horarios/eliminados', [HorarioController::class, 'eliminados'])
     ->name('coordinador.horarios.eliminados');

// Restauración
Route::patch('/coordinador/horarios/{horario}/restaurar', [HorarioController::class, 'restore'])
->name('coordinador.horarios.restaurar');

// Fin de las rutas de horarios