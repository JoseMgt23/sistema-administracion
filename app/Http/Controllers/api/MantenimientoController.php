<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mantenimientos = Mantenimiento::all();
        return response()->json(['mantenimientos' => $mantenimientos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'propiedad_id' => ['required', 'exists:propiedades,id'],
            'descripcion' => ['required', 'string'],
            'fecha' => ['required', 'date'],
            'costo' => ['required', 'numeric'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ], 400);
        }

        $mantenimiento = new Mantenimiento();
        $mantenimiento->propiedad_id = $request->propiedad_id;
        $mantenimiento->descripcion = $request->descripcion;
        $mantenimiento->fecha = $request->fecha;
        $mantenimiento->costo = $request->costo;
        $mantenimiento->save();

        return response()->json(['mantenimiento' => $mantenimiento], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        if (is_null($mantenimiento)) {
            return response()->json(['msg' => 'Mantenimiento no encontrado'], 404);
        }
        return response()->json(['mantenimiento' => $mantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        if (is_null($mantenimiento)) {
            return response()->json(['msg' => 'Mantenimiento no encontrado'], 404);
        }

        $validate = Validator::make($request->all(), [
            'propiedad_id' => ['required', 'exists:propiedades,id'],
            'descripcion' => ['required', 'string'],
            'fecha' => ['required', 'date'],
            'costo' => ['required', 'numeric'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ], 400);
        }

        $mantenimiento->propiedad_id = $request->propiedad_id;
        $mantenimiento->descripcion = $request->descripcion;
        $mantenimiento->fecha = $request->fecha;
        $mantenimiento->costo = $request->costo;
        $mantenimiento->save();

        return response()->json(['mantenimiento' => $mantenimiento]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        if (is_null($mantenimiento)) {
            return response()->json(['msg' => 'Mantenimiento no encontrado'], 404);
        }
        $mantenimiento->delete();
        return response()->json(['msg' => 'Mantenimiento eliminado exitosamente']);
    }
}
