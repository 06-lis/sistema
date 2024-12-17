<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return response()->json($empleado);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return response()->json(null, 204);
    }
}
