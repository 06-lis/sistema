<?php

namespace App\Http\Controllers;

use App\Models\detalleCompra;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function index()
    {
        $detallesCompras = DetalleCompra::all();
        return response()->json($detallesCompras);
    }

    public function show($id)
    {
        $detalleCompra = DetalleCompra::findOrFail($id);
        return response()->json($detalleCompra);
    }

    public function store(Request $request)
    {
        $detalleCompra = DetalleCompra::create($request->all());
        return response()->json($detalleCompra, 201);
    }

    public function update(Request $request, $id)
    {
        $detalleCompra = DetalleCompra::findOrFail($id);
        $detalleCompra->update($request->all());
        return response()->json($detalleCompra);
    }

    public function destroy($id)
    {
        $detalleCompra = DetalleCompra::findOrFail($id);
        $detalleCompra->delete();
        return response()->json(null, 204);
    }
}
