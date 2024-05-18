<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with(['propiedad', 'arrendatario'])->get();
        return response()->json(['contratos' => $contratos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'propiedad_id' => 'required|exists:propiedades,id',
            'arrendatario_id' => 'required|exists:arrendatarios,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'renta_mensual' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $contrato = new Contrato();
        $contrato->propiedad_id = $request->propiedad_id;
        $contrato->arrendatario_id = $request->arrendatario_id;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->renta_mensual = $request->renta_mensual;
        $contrato->save();

        return response()->json(['contrato' => $contrato], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contrato = Contrato::with(['propiedad', 'arrendatario'])->find($id);
        if (is_null($contrato)) {
            return response()->json(['msg' => 'Contrato no encontrado'], 404);
        }
        return response()->json(['contrato' => $contrato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contrato = Contrato::find($id);
        if (is_null($contrato)) {
            return response()->json(['msg' => 'Contrato no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'propiedad_id' => 'required|exists:propiedades,id',
            'arrendatario_id' => 'required|exists:arrendatarios,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'renta_mensual' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $contrato->propiedad_id = $request->propiedad_id;
        $contrato->arrendatario_id = $request->arrendatario_id;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->renta_mensual = $request->renta_mensual;
        $contrato->save();

        return response()->json(['contrato' => $contrato]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contrato = Contrato::find($id);
        if (is_null($contrato)) {
            return response()->json(['msg' => 'Contrato no encontrado'], 404);
        }
        $contrato->delete();
        return response()->json(['msg' => 'Contrato eliminado exitosamente']);
    }
}
