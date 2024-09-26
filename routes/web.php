<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta inicial
// Redirigir la ruta raíz al login
Route::get('/', function () {
    return redirect()->route('login'); // Asumiendo que 'login' es la ruta del login
});

// O si prefieres mostrar el formulario de login directamente
Route::get('/', function () {
    return view('auth.login'); // Asegúrate de que este archivo exista
});

// Rutas de autenticación
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('empleados', EmpleadoController::class);