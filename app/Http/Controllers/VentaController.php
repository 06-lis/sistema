<?php

namespace App\Http\Controllers;

use App\Models\venta;
use App\Models\cliente;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        $clientes = cliente::all();
        $empleados = empleado::all();
        return view('venta.index',compact('ventas','clientes','empleados'));
    }

    public function create()
    {   
        $clientes = cliente::all();
        $empleados = empleado::whereHas('tipoEmpleado', function ($query) {
            $query->where('descripcionTip', 'Encargado de Ventas');
        })->get();
        return view('venta.create',compact('clientes','empleados'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = cliente::all();
        $empleados = empleado::all();
        return view('venta.edit',compact('venta','clientes','empleados'));
    }

    public function massCreate()
{
    $faker = Faker::create();

    $empleados = DB::table('empleados')->pluck('id_empleado')->toArray();
    $clientes = DB::table('clientes')->pluck('id_cliente')->toArray();

    $ventas = [];
    for ($i = 0; $i < 100; $i++) {
        $id_cliente = $faker->randomElement($clientes);
        $id_empleado = $faker->randomElement($empleados);
        $fechaVe = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');

        // Validar si ya existe una venta con esta combinación
        $existe = DB::table('ventas')
            ->where('id_cliente', $id_cliente)
            ->where('id_empleado', $id_empleado)
            ->where('fechaVe', $fechaVe)
            ->exists();

        if (!$existe) {
            $ventas[] = [
                'fechaVe' => $fechaVe,
                'montoTotalVe' => $faker->randomFloat(2, 100, 5000),
                'id_cliente' => $id_cliente,
                'id_empleado' => $id_empleado,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }

    if (!empty($ventas)) {
        DB::table('ventas')->insert($ventas);
        return count($ventas) . " ventas generadas e insertadas exitosamente.";
    }

    return "No se generaron ventas porque todas ya existían.";
}

    public function store(Request $request)
    {
        $venta = Venta::create($request->all());
        return redirect('/venta');
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return redirect('/venta');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect('/venta');
    }
}
