<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return response()->json(['propiedades' => $propiedades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $propiedad = new Propiedad();
        $propiedad->direccion = $request->direccion;
        $propiedad->descripcion = $request->descripcion;
        $propiedad->tipo = $request->tipo;
        $propiedad->disponibilidad = $request->disponibilidad;
        $propiedad->save();
        return response()->json(['propiedad' => $propiedad]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $propiedad = Propiedad::find($id);
        return response()->json(['propiedad' => $propiedad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $propiedad = Propiedad::find($id);
        $propiedad->direccion = $request->direccion;
        $propiedad->descripcion = $request->descripcion;
        $propiedad->tipo = $request->tipo;
        $propiedad->disponibilidad = $request->disponibilidad;
        $propiedad->save();

        return response()->json(['propiedad' => $propiedad]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $propiedad = Propiedad::find($id);
        $propiedad->delete();
        $propiedades = Propiedad::all();
        return response()->json(['Propiedades' => $propiedades, 'success' => true]);
    }
}
