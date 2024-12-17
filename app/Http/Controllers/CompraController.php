<?php

namespace App\Http\Controllers;

use App\Models\compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return response()->json($compras);
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return response()->json($compra);
    }

    public function store(Request $request)
    {
        $compra = Compra::create($request->all());
        return response()->json($compra, 201);
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        return response()->json($compra);
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return response()->json(null, 204);
    }
}
