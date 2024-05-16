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
        return json_encode(['propiedad'=>$propiedad]);
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
        $propiedad = Propiedad::fin($id);
        $propiedad = DB::table('direccion')
        ->orderBy('descripcion')
        ->orderBy('tipo')
        ->orderBy('disponibilidad')
        ->get();

        return json_encode(['propiedad'=>$propiedad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $propiedad = Propiedad::find($id);
        $propiedades->direccion = $request->direccion;
        $propiedad->descripcion = $request->descripcion;
        $propiedad->tipo = $request->tipo;
        $propiedad->disponibilidad = $request->disponibilidad;
        $propiedad->save();
        
        return json_encode(['propiedad'=>$propiedad]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $propiedad = Propiedad::find($id);
        $propiedad->delete();
        $propiedades = Propiedad::all();
        return json_encode(['propiedad'=>$propiedad]);
        
    }
}
