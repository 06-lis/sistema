<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return response()->json($ventas);
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return response()->json($venta);
    }

    public function store(Request $request)
    {
        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return response()->json($venta);
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return response()->json(null, 204);
    }
}
