<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Arrendatario;
use Illuminate\Http\Request;

class ArrendatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrendatarios = Arrendatario::all();
        return response()->json(['arrendatarios' => $arrendatarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arrendatario = new Arrendatario();
        $arrendatario->nombre = $request->nombre;
        $arrendatario->apellido = $request->apellido;
        $arrendatario->telefono = $request->telefono;
        $arrendatario->email = $request->email;
        // Agrega aquí el resto de los campos del arrendatario
        $arrendatario->save();
        return response()->json(['arrendatario' => $arrendatario]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arrendatario = Arrendatario::find($id);
        return response()->json(['arrendatario' => $arrendatario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $arrendatario = Arrendatario::find($id);
        // Actualiza aquí los campos del arrendatario según lo necesario
        $arrendatario->save();

        return response()->json(['arrendatario' => $arrendatario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arrendatario = Arrendatario::find($id);
        $arrendatario->delete();
        $arrendatarios = Arrendatario::all();
        return response()->json(['arrendatarios' => $arrendatarios, 'success' => true]);
    }
}
