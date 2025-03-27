<?php

namespace App\Http\Controllers;

// Importar librerias y clases que vamos a ocupar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa el facade Auth
use Illuminate\Support\Facades\Hash; // Importa el facade Hash
use App\Models\Alumno;
use App\Models\Coordinador;
use App\Models\Profesor;
use Database\Factories\UserFactory;

class AuthController extends Controller
{
    // Método para mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('register');
    }
    
    // Metodo para mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Método para registrar alumnos
    public function register(Request $request)
    {
        // Validar los datos del formulario de alumno
        $validatedData = $request->validate([
            'no_control' => 'required|string|max:255|unique:alumnos',
            'nombre_alumno' => 'required|string|max:255',
            'apellidos_alumno' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'correo_institucional' => 'required|string|email|max:255|unique:alumnos',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        try {
            // Crear el alumno usando UserFactory
            $alumno = UserFactory::createUser('alumno', $validatedData);
    
            // Iniciar sesión automáticamente después del registro
            Auth::guard('alumno')->login($alumno);
    
            // Redirigir al dashboard del alumno
            return redirect()->route('alumno.dashboard');
        } catch (\Exception $e) {
            // Si hay un error, redirigir de vuelta al formulario con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al registrar el alumno. Error: ' . $e->getMessage()]);
        }
    }
    
    // Método para registrar profesores (solo accesible para coordinadores)
    public function registerProfesor(Request $request)
    {
        // Validar los datos del formulario de profesor
        $validatedData = $request->validate([
            'rfc_profesor' => 'required|string|max:255|unique:profesores',
            'nombre_profesor' => 'required|string|max:255',
            'apellidos_profesor' => 'required|string|max:255',
            'correo_profesor' => 'required|string|email|max:255|unique:profesores',
            'num_telefono' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        try {
            // Crear el profesor usando UserFactory
            $profesor = UserFactory::createUser('profesor', $validatedData);
    
            // Redirigir a la lista de profesores con un mensaje de éxito
            return redirect()->route('coordinador.profesores')->with('success', 'Profesor registrado correctamente');
        } catch (\Exception $e) {
            // Si hay un error, redirigir de vuelta al formulario con un mensaje de error
                return redirect()->back()->withErrors(['error' => 'Hubo un problema al registrar el profesor. Error: ' . $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        'role' => 'required|in:alumno,profesor,coordinador', // Asegurar que el rol sea válido
    ]);

    // Determinar el guard y la columna de correo según el rol
    switch ($request->role) {
        case 'alumno':
            $guard = 'alumno';
            $emailColumn = 'correo_institucional'; // Columna correcta para alumnos
            $redirect = '/alumno';
            break;
        case 'profesor':
            $guard = 'profesor';
            $emailColumn = 'correo_profesor'; // Columna correcta para profesores
            $redirect = '/profesor';
            break;
        case 'coordinador':
            $guard = 'coordinador';
            $emailColumn = 'correo_coordinador'; // Columna correcta para coordinadores
            $redirect = '/coordinador';
            break;
        default:
            return back()->withErrors(['role' => 'Rol no válido']);
    }

    // Depuración: Imprimir los datos recibidos
    \Log::info('Intentando autenticar:', [
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role,
        'guard' => $guard,
        'emailColumn' => $emailColumn,
    ]);

    // Intentar autenticar al usuario
    if (Auth::guard($guard)->attempt([$emailColumn => $request->email, 'password' => $request->password])) {
        \Log::info('Autenticación exitosa para el rol: ' . $request->role);

        // Depuración: Verificar si el usuario está autenticado
        if (Auth::guard($guard)->check()) {
            \Log::info('Usuario autenticado correctamente en el guard: ' . $guard);
        } else {
            \Log::error('El usuario no está autenticado en el guard: ' . $guard);
        }

        // Depuración: Verificar la URL de redirección
        \Log::info('Redirigiendo a: ' . $redirect);

        // Redirigir a la ruta correspondiente
        return redirect()->intended($redirect);
    }

    // Depuración: Imprimir el error de autenticación
    \Log::error('Error de autenticación para el rol: ' . $request->role);

    // Si la autenticación falla, regresar con un mensaje de error
    return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}