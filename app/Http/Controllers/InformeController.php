<?php

namespace App\Http\Controllers;

use App\Models\informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::all();
        return response()->json($informes);
    }

    public function show($id)
    {
        $informe = Informe::findOrFail($id);
        return response()->json($informe);
    }

    public function store(Request $request)
    {
        $informe = Informe::create($request->all());
        return response()->json($informe, 201);
    }

    public function update(Request $request, $id)
    {
        $informe = Informe::findOrFail($id);
        $informe->update($request->all());
        return response()->json($informe);
    }

    public function destroy($id)
    {
        $informe = Informe::findOrFail($id);
        $informe->delete();
        return response()->json(null, 204);
    }
}
