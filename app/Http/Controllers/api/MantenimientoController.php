<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;

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
        $mantenimiento = new Mantenimiento();
        $mantenimiento->propiedad_id = $request->propiedad_id;
        // Agrega aquí el resto de los campos del mantenimiento
        $mantenimiento->save();
        return response()->json(['mantenimiento' => $mantenimiento]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        return response()->json(['mantenimiento' => $mantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        // Actualiza aquí los campos del mantenimiento según lo necesario
        $mantenimiento->save();

        return response()->json(['mantenimiento' => $mantenimiento]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mantenimiento = Mantenimiento::find($id);
        $mantenimiento->delete();
        $mantenimientos = Mantenimiento::all();
        return response()->json(['mantenimientos' => $mantenimientos, 'success' => true]);
    }
}
