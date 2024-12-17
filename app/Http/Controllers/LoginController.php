<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $logins = Login::all();
        return response()->json($logins);
    }

    public function show($id)
    {
        $login = Login::findOrFail($id);
        return response()->json($login);
    }

    public function store(Request $request)
    {
        $login = Login::create($request->all());
        return response()->json($login, 201);
    }

    public function update(Request $request, $id)
    {
        $login = Login::findOrFail($id);
        $login->update($request->all());
        return response()->json($login);
    }

    public function destroy($id)
    {
        $login = Login::findOrFail($id);
        $login->delete();
        return response()->json(null, 204);
    }
}
