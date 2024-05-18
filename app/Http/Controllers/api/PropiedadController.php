<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:255|unique:propiedades',
            'descripcion' => 'required',
            'tipo' => 'required|max:100',
            'disponibilidad' => 'required|in:disponible,ocupado'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

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
        if (is_null($propiedad)) {
            return response()->json(['msg' => 'Propiedad no encontrada'], 404);
        }

        return response()->json(['propiedad' => $propiedad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'direccion' => 'required|max:255|unique:propiedades,direccion,'.$id,
            'descripcion' => 'required',
            'tipo' => 'required|max:100',
            'disponibilidad' => 'required|in:disponible,ocupado'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $propiedad = Propiedad::find($id);
        if (is_null($propiedad)) {
            return response()->json(['msg' => 'Propiedad no encontrada'], 404);
        }

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
        if (is_null($propiedad)) {
            return response()->json(['msg' => 'Propiedad no encontrada'], 404);
        }

        $propiedad->delete();
        return response()->json(['msg' => 'Propiedad eliminada con éxito']);
    }
}
