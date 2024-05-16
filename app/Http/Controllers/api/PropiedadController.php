<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Propiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedad.index', ['propiedades' => $propiedades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $propiedades = new Propiedad();
        $propiedades->direccion = $request->direccion;
        $propiedad->descripcion = $request->descripcion;
        $propiedad->tipo = $request->tipo;
        $propiedad->disponibilidad = $request->disponibilidad;
        $propiedad->save();
        return json_encode(['propiedad' => $propiedad]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
