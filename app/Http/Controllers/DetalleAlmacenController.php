<?php

namespace App\Http\Controllers;

use App\Models\detalleAlmacen;
use Illuminate\Http\Request;

class DetalleAlmacenController extends Controller
{
    public function index()
    {
        $detallesAlmacens = DetalleAlmacen::all();
        return response()->json($detallesAlmacens);
    }

    public function show($id)
    {
        $detalleAlmacen = DetalleAlmacen::findOrFail($id);
        return response()->json($detalleAlmacen);
    }

    public function store(Request $request)
    {
        $detalleAlmacen = DetalleAlmacen::create($request->all());
        return response()->json($detalleAlmacen, 201);
    }

    public function update(Request $request, $id)
    {
        $detalleAlmacen = DetalleAlmacen::findOrFail($id);
        $detalleAlmacen->update($request->all());
        return response()->json($detalleAlmacen);
    }

    public function destroy($id)
    {
        $detalleAlmacen = DetalleAlmacen::findOrFail($id);
        $detalleAlmacen->delete();
        return response()->json(null, 204);
    }
}
