<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContratoController;
use App\Http\Controllers\Api\MantenimientoController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return $request->user();
});


Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');
Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades');
Route::delete('/propiedades/{propiedad}' , [PropiedadController::class, 'destroy'])->name('propiedades.destroy');
Route::get('/propiedades/{propiedad}' , [PropiedadController::class, 'show'])->name('propiedades.show');
Route::put('/propiedades/{propiedad}' , [PropiedadController::class, 'update'])->name('propiedades.update');


Route::post('/arrendatarios', [ArrendatarioController::class, 'store'])->name('arrendatarios.store');
Route::get('/arrendatarios', [ArrendatarioController::class, 'index'])->name('arrendatarios.index');
Route::delete('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'destroy'])->name('arrendatarios.destroy');
Route::get('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'show'])->name('arrendatarios.show');
Route::put('/arrendatarios/{arrendatario}', [ArrendatarioController::class, 'update'])->name('arrendatarios.update');


Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store');
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index');
Route::delete('/contratos/{contrato}', [ContratoController::class, 'destroy'])->name('contratos.destroy');
Route::get('/contratos/{contrato}', [ContratoController::class, 'show'])->name('contratos.show');
Route::put('/contratos/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');




