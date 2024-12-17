<?php

namespace App\Http\Controllers;

use App\Models\almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacens = Almacen::all();
        return response()->json($almacens);
    }

    public function show($id)
    {
        $almacen = Almacen::findOrFail($id);
        return response()->json($almacen);
    }

    public function store(Request $request)
    {
        $almacen = Almacen::create($request->all());
        return response()->json($almacen, 201);
    }

    public function update(Request $request, $id)
    {
        $almacen = Almacen::findOrFail($id);
        $almacen->update($request->all());
        return response()->json($almacen);
    }

    public function destroy($id)
    {
        $almacen = Almacen::findOrFail($id);
        $almacen->delete();
        return response()->json(null, 204);
    }
}
