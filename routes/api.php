<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContratoController;
use App\Http\Controllers\Api\MantenimientoController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\api\PropiedadController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return $request->user();
});

//Propiedades
Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');
Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades');
Route::delete('/propiedades/{propiedad}' , [PropiedadController::class, 'destroy'])->name('propiedades.destroy');
Route::get('/propiedades/{propiedad}' , [PropiedadController::class, 'show'])->name('propiedades.show');
Route::put('/propiedades/{propiedad}' , [PropiedadController::class, 'update'])->name('propiedades.update');

//Arrendatarios
Route::post('/arrendatarios', [ArrendatarioController::class, 'store'])->name('arrendatarios.store');
Route::get('/arrendatarios', [ArrendatarioController::class, 'index'])->name('arrendatarios.index');
Route::delete('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'destroy'])->name('arrendatarios.destroy');
Route::get('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'show'])->name('arrendatarios.show');
Route::put('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'update'])->name('arrendatarios.update');

//Contratos
Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store');
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index');
Route::delete('/contratos/{contrato}', [ContratoController::class, 'destroy'])->name('contratos.destroy');
Route::get('/contratos/{contrato}', [ContratoController::class, 'show'])->name('contratos.show');
Route::put('/contratos/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');

//Mantenimiento
Route::post('/mantenimientos', [MantenimientoController::class, 'store'])->name('mantenimientos.store');
Route::get('/mantenimientos', [MantenimientoController::class, 'index'])->name('mantenimientos.index');
Route::delete('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');
Route::get('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'show'])->name('mantenimientos.show');
Route::put('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'update'])->name('mantenimientos.update');

//Pagos
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::delete('/pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');
Route::get('/pagos/{pago}', [PagoController::class, 'show'])->name('pagos.show');
Route::put('/pagos/{pago}', [PagoController::class, 'update'])->name('pagos.update');

