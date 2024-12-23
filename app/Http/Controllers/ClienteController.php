<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index')->with('clientes',$clientes);
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function edit($id)
    {
        $cliente=cliente::find($id);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        $cliente->save();
        return redirect('/cliente');
    }
    public function massCreate(Request $request)
    {
        $faker = faker::create();   
        $cliente = [];
        for ($i = 0; $i < 400; $i++) {
            $cliente[] = [
                'nombreCl' => $faker->firstName,
                'apellidosCl' => $faker->lastName,
                'telefonoCl' => $faker->numerify('7######'),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('clientes')->insert($cliente);
        return redirect('cliente.index')->with('success', 'Clientes creados exitosamente');
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect('/cliente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect('/cliente');
    }
}
