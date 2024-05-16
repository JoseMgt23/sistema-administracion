<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return $request->user();
});


Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');
Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades');
Route::delete('/propiedades/{propiedad}' , [PropiedadController::class, 'destroy'])->name('propiedades.destroy');
Route::get('/propiedades/{propiedad}' , [PropiedadController::class, 'show'])->name('propiedades.show');
Route::put('/propiedades/{propiedad}' , [PropiedadController::class, 'update'])->name('propiedades.update');