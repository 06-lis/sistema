<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\empleado;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        $proveedors=proveedor::all();
        $empleados=empleado::all();
        return view('compra.index',compact('compras','proveedors','empleados'));
    }
    public function create()
    {
        $proveedors=proveedor::all();
        $empleados=empleado::whereHas('tipoEmpleado', function ($query) {
            $query->where('descripcionTip', 'Encargado de Compras');
        })
        ->get();
        return view('compra.create',compact('proveedors','empleados'));
    }
    public function massCreate()
    {   $faker = Faker::create();
        $proveedors = DB::table('proveedors')->pluck('id_proveedor')->toArray();
        $empleados = DB::table('empleados')->pluck('id_empleado')->toArray();
        $compras = [];
            for ($i = 0; $i < 100; $i++) {
                $id_empleado = $faker->randomElement($empleados);
                $id_proveedor = $faker->randomElement($proveedors);
                $fechaCo = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        
                // Validar si ya existe una venta con esta combinación
                $existe = DB::table('compras')
                    ->where('id_empleado', $id_empleado)
                    ->where('id_proveedor', $id_proveedor)                    
                    ->where('fechaCo', $fechaCo)
                    ->exists();
        
                if (!$existe) {
                    $compras[] = [
                        'fechaCo' => $fechaCo,
                        'montoTotalCo' => $faker->randomFloat(2, 100, 5000),
                        'id_empleado' => $id_empleado,
                        'id_proveedor' => $id_proveedor,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                
            }
        }
        
            if (!empty($compras)) {
                DB::table('compras')->insert($compras);
                return count($compras) . " compras generadas e insertadas exitosamente.";
            }
        
            return "No se generaron compras porque todas ya existían.";
        
    }

    public function store(Request $request)
    {
        $compra = Compra::create($request->all());
        return redirect('/compra');
    }
    public function edit($id)
    {
        $empleados= empleado::all();
        $proveedors=proveedor::all();
        $compra = Compra::findOrFail($id);
        return view('compra.edit',compact('empleados','proveedors','compra'));
    }
    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        return redirect('/compra');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return redirect('/compra');
    }
}
