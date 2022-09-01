<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// url's principales
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas');

//url's pacientes

Route::get('/paciente/crud', [App\Http\Controllers\PacientesController::class, 'index'])->name('pacientes.crud');

Route::get('/paciente/{id}/editar-paciente', [App\Http\Controllers\PacientesController::class, 'edit'])->name('pacientes.edit-paciente');

Route::post('/paciente/actualizar-paciente/{id}', [App\Http\Controllers\PacientesController::class, 'update'])->name('pacientes.update');

//url's fisioterapeutas

Route::get('/fisioterapeuta/crud', [App\Http\Controllers\FisioterapeutasController::class, 'index'])->name('fisioterapeutas.crud');

//url's medicos

Route::get('/medicos/crud', [App\Http\Controllers\MedicosController::class, 'index'])->name('medicos.crud');


//url's citas

Route::post('/citas/agendar', [App\Http\Controllers\CitasController::class, 'store']);

Route::get('/citas/buscar-documento', [App\Http\Controllers\CitasController::class, 'busqueda'])->name('busqueda');

Route::get('/citas/editar-cita/{id}', [App\Http\Controllers\CitasController::class, 'edit'])->name('event.edit');

Route::post('/citas/actualizar-cita/{id}', [App\Http\Controllers\CitasController::class, 'update'])->name('event.update');

Route::post('/citas/actualizar-drop/{id}', [App\Http\Controllers\CitasController::class, 'updateDrop']);

Route::post('/citas/borrar-cita/{id}', [App\Http\Controllers\CitasController::class, 'destroy'])->name('borrar-cita.destroy');

Route::get('/citas/ver-cita', [App\Http\Controllers\CitasController::class, 'show']);

// pruebas
