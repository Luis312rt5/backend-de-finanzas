<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;

class GastoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'valor' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $gasto = Gasto::create([
            'nombre' => $request->nombre,
            'valor' => $request->valor,
            'fecha' => $request->fecha,
        ]);

        return response()->json(['mensaje' => 'Gasto guardado', 'gasto' => $gasto], 201);
    }

    public function index()
    {
        return response()->json(Gasto::all());
    }

    public function destroy($id)
    {
    $gasto = Gasto::find($id);

    if (!$gasto) {
        return response()->json(['message' => 'Gasto no encontrado'], 404);
    }

    $gasto->delete();
    return response()->json(['message' => 'Gasto eliminado con éxito'], 200);
    }
}
