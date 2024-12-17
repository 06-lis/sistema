<?php

namespace App\Http\Controllers;

use App\Models\tipoEmpleado;
use Illuminate\Http\Request;

class TipoEmpleadoController extends Controller
{
    public function index()
    {
        $tipoEmpleados = TipoEmpleado::all();
        return response()->json($tipoEmpleados);
    }

    public function show($id)
    {
        $tipoEmpleado = TipoEmpleado::findOrFail($id);
        return response()->json($tipoEmpleado);
    }

    public function store(Request $request)
    {
        $tipoEmpleado = TipoEmpleado::create($request->all());
        return response()->json($tipoEmpleado, 201);
    }

    public function update(Request $request, $id)
    {
        $tipoEmpleado = TipoEmpleado::findOrFail($id);
        $tipoEmpleado->update($request->all());
        return response()->json($tipoEmpleado);
    }

    public function destroy($id)
    {
        $tipoEmpleado = TipoEmpleado::findOrFail($id);
        $tipoEmpleado->delete();
        return response()->json(null, 204);
    }
}
