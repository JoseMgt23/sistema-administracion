<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all();
        return response()->json(['contratos' => $contratos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contrato = new Contrato();
        $contrato->propiedad_id = $request->propiedad_id;
        // Añade aquí el resto de los campos del contrato
        $contrato->save();
        return response()->json(['contrato' => $contrato]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contrato = Contrato::find($id);
        return response()->json(['contrato' => $contrato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contrato = Contrato::find($id);
        // Actualiza aquí los campos del contrato según lo que necesites
        $contrato->save();

        return response()->json(['contrato' => $contrato]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
        $contratos = Contrato::all();
        return response()->json(['contratos' => $contratos, 'success' => true]);
    }
}
