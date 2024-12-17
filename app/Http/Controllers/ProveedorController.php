<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedors = Proveedor::all();
        return response()->json($proveedors);
    }

    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return response()->json($proveedor);
    }

    public function store(Request $request)
    {
        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return response()->json(null, 204);
    }
}
