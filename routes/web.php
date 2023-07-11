<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.plantilla');
});

//RUTAS PARA EMPLEADOS
Route::resource('Empleados', EmpleadoController::class);

Route::get('CancelarE', function () {
    return redirect()->route('Empleados.index')->with('datos','Acción Cancelada ..!');
  })->name('cancelare');
Route::get('empleados/{id}/eliminar',[EmpleadoController::class,'destroy'])->name('Empleados.destroy');