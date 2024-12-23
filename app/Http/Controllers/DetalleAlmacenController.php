<?php

namespace App\Http\Controllers;

use App\Models\detalleAlmacen;
use App\Models\almacen;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class DetalleAlmacenController extends Controller
{
    public function index()
    {
        $detalles = DetalleAlmacen::all();
        $almacens =almacen::all();
        $productos=producto::all();

        return view('detalleAl.index',compact('detalles','almacens','productos'));
    }

    public function create()
    {
        $almacens =almacen::all();
        $productos=producto::all();
        return view('detalleAl.create',compact('almacens','productos'));
    }
    public function massCreate()
    {  $faker = Faker::create();
        $productos = DB::table('productos')->pluck('id_producto')->toArray();
        $almacenes = DB::table('almacens')->pluck('id_almacen')->toArray();
        $detalleAlmacens = [];
            for ($i = 0; $i < 100; $i++) {
                $id_producto = $faker->randomElement($productos);
                $id_almacen = $faker->randomElement($almacenes);
        
                // Validar si ya existe una venta con esta combinación
                $existe = DB::table('detalle_almacens')
                    ->where('id_producto', $id_producto)
                    ->where('id_almacen', $id_almacen)
                    ->exists();
        
                if (!$existe) {
                    $detalleAlmacens[] = [
                        'id_producto' => $id_producto,
                        'id_almacen' => $id_almacen,
                        'stock' => $faker->randomFloat(2, 0, 100),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            if (!empty($detalleAlmacens)) {
                DB::table('detalle_almacens')->insert($detalleAlmacens);
                return count($detalleAlmacens) . " ventas generadas e insertadas exitosamente.";
            }
        
            return "No se generaron compras porque todas ya existían.";
        
    }
    public function edit($id1,$id2)
    {   
        $almacenes =almacen::all();
        $productos=producto::all();
        $detalle = DetalleAlmacen::where('id_producto',$id1)->where('id_almacen',$id2)->first();
        return view('detalleAl.edit',compact('detalle','productos','almacenes'));
    }

    public function store(Request $request)
    {
        $detalle =new  detalleAlmacen();
        $detalle->stock=$request->input('stock');
        $detalle->id_producto=$request->input('id_producto');
        $detalle->id_almacen=$request->input('id_almacen');
        $detalle->save();
        return redirect('/detalleAl');
    }

    public function update(Request $request, $id1,$id2)
    {
        
        $detalle = DetalleAlmacen::where('id_producto',$id1)->where('id_almacen',$id2)->first();
        $detalle->update($request->all());
        return redirect('/detalleAl');
     
       
    }

    public function destroy($id1,$id2)
    {
        $detalleAlmacen = DetalleAlmacen::where('id_producto',$id1)->where('id_almacen',$id2)->first();
        $detalleAlmacen->delete();
        return redirect('/detalleAl');
    }
}
