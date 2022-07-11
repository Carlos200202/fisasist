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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas');

Route::post('/citas/agendar', [App\Http\Controllers\CitasController::class, 'store']);

Route::get('/citas/editar-cita/{id}', [App\Http\Controllers\CitasController::class, 'edit'])->name('event.edit');

// Route::post('/citas/actualizar-cita/{id}', [App\Http\Controllers\CitasController::class, 'update'])->name('citas.update');

// Route::post('/citas/borrar-cita/{id}', [App\Http\Controllers\CitasController::class, 'destroy'])->name('borrar-cita.destroy');

Route::get('/citas/ver-cita', [App\Http\Controllers\CitasController::class, 'show']);

// pruebas

// Route::get('/prueba', [App\Http\Controllers\PacientesController::class, 'index']);

Route::get('/citas/autocomplete', [App\Http\Controllers\PacientesController::class, 'autocompletePat'])->name('index.autocompletePat');