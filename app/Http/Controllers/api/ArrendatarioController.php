<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
        $validate = Validator::make($request->all(), [
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'telefono' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:arrendatarios'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $arrendatario = new Arrendatario();
        $arrendatario->nombre = $request->nombre;
        $arrendatario->apellido = $request->apellido;
        $arrendatario->telefono = $request->telefono;
        $arrendatario->email = $request->email;
        $arrendatario->save();

        return response()->json(['arrendatario' => $arrendatario], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arrendatario = Arrendatario::find($id);
        if (is_null($arrendatario)) {
            return response()->json(['msg' => 'Arrendatario no encontrado'], 404);
        }
        return response()->json(['arrendatario' => $arrendatario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $arrendatario = Arrendatario::find($id);
        if (is_null($arrendatario)) {
            return response()->json(['msg' => 'Arrendatario no encontrado'], 404);
        }

        $validate = Validator::make($request->all(), [
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'telefono' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:arrendatarios,email,' . $id],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $arrendatario->nombre = $request->nombre;
        $arrendatario->apellido = $request->apellido;
        $arrendatario->telefono = $request->telefono;
        $arrendatario->email = $request->email;
        $arrendatario->save();

        return response()->json(['arrendatario' => $arrendatario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arrendatario = Arrendatario::find($id);
        if (is_null($arrendatario)) {
            return response()->json(['msg' => 'Arrendatario no encontrado'], 404);
        }
        $arrendatario->delete();
        return response()->json(['msg' => 'Arrendatario eliminado exitosamente']);
    }
}
