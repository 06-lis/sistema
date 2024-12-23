<?php

namespace App\Http\Controllers;

use App\Models\detalleVenta;
use App\Models\detalleAlmacen;
use App\Models\venta;
use App\Models\producto;
use App\Models\almacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalleAs = DetalleAlmacen::all();
        $detalleVs =detalleVenta::all();
        $ventas=venta::all();

        return view('detalleVe.index',compact('detalleAs','detalleVs','ventas'));
    }
    public function create()
    {
        $ventas=venta::all();
        $detalleAs=detalleAlmacen::all();
        $productos=producto::all();
        $almacenes=almacen::all();
        return view('detalleVe.create',compact('ventas','productos','almacenes','detalleAs'));
    }

    public function massCreate()
{
    $faker = Faker::create();
    $ventas = DB::table('ventas')->pluck('id_venta')->toArray();
    $productos = DB::table('productos')->pluck('id_producto')->toArray();

    $detallesVenta = [];

    for ($i = 0; $i < 200; $i++) { // Generar 200 registros, por ejemplo
        $id_venta = $faker->randomElement($ventas);
        $id_producto = $faker->randomElement($productos);

        // Validar si ya existe un detalle con esta combinación
        $existe = DB::table('detalle_ventas')
            ->where('id_venta', $id_venta)
            ->where('idDal', $id_producto)
            ->exists();

        if (!$existe) {
            $detallesVenta[] = [
                'id_venta' => $id_venta,
                'idDal' => $id_producto,
                'precioDv' => $faker->randomFloat(2, 5, 500), // Precio entre 5 y 500
                'cantidadDv' => $faker->numberBetween(1, 100), // Cantidad entre 1 y 100
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }

    if (!empty($detallesVenta)) {
        DB::table('detalle_ventas')->insert($detallesVenta);
        return count($detallesVenta) . " detalles de ventas generados e insertados exitosamente.";
    }

    return "No se generaron detalles de ventas porque todas las combinaciones ya existían.";
}

    public function store(Request $request)
    {
        $detalleVenta = DetalleVenta::create($request->all());
        return redirect('/detalleVe');
    }
    
    public function edit($id1,$id2)
    {
        $detalleVe= DetalleVenta::where('idDv',$id1)->where('idDal',$id2)->first();
        $productos=producto::all();
        $detalleAs=detalleAlmacen::all();
        $almacenes=almacen::all();
        $ventas=venta::all();
        return view('detalleVe.edit',compact('ventas','productos','almacenes','detalleVe','detalleAs'));
    }

    public function update(Request $request, $id1,$id2)
    {
        $detalleVenta = DetalleVenta::where('idDv',$id1)->where('idDal',$id2)->first();
        $detalleVenta->update($request->all());
        return redirect('/detalleVe');
    }

    public function destroy($id1,$id2)
    {
        $detalleVenta = DetalleVenta::where('idDv',$id1)->where('idDal',$id2)->first();
        $detalleVenta->delete();
        return redirect('/detalleVe');
    }
}
