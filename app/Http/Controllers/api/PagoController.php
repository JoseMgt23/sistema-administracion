<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        return response()->json(['pagos' => $pagos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'contrato_id' => ['required', 'exists:contratos,id'],
            'fecha_pago' => ['required', 'date'],
            'monto' => ['required', 'numeric'],
            'estado' => ['required', 'in:pendiente,completado'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ], 400);
        }

        $pago = new Pago();
        $pago->contrato_id = $request->contrato_id;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->monto = $request->monto;
        $pago->estado = $request->estado;
        $pago->save();

        return response()->json(['pago' => $pago], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pago = Pago::find($id);
        if (is_null($pago)) {
            return response()->json(['msg' => 'Pago no encontrado'], 404);
        }
        return response()->json(['pago' => $pago]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pago = Pago::find($id);
        if (is_null($pago)) {
            return response()->json(['msg' => 'Pago no encontrado'], 404);
        }

        $validate = Validator::make($request->all(), [
            'contrato_id' => ['required', 'exists:contratos,id'],
            'fecha_pago' => ['required', 'date'],
            'monto' => ['required', 'numeric'],
            'estado' => ['required', 'in:pendiente,completado'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ], 400);
        }

        $pago->contrato_id = $request->contrato_id;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->monto = $request->monto;
        $pago->estado = $request->estado;
        $pago->save();

        return response()->json(['pago' => $pago]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pago = Pago::find($id);
        if (is_null($pago)) {
            return response()->json(['msg' => 'Pago no encontrado'], 404);
        }
        $pago->delete();
        return response()->json(['msg' => 'Pago eliminado exitosamente']);
    }
}
