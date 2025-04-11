<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        return Ingreso::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'valor' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        return Ingreso::create($request->all());
    }

    public function destroy($id)
    {
    $ingreso = Ingreso::find($id);

    if (!$ingreso) {
        return response()->json(['message' => 'Ingreso no encontrado'], 404);
    }

    $ingreso->delete();
    return response()->json(['message' => 'Ingreso eliminado con éxito'], 200);
    }
}
