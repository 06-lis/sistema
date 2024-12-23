<?php

namespace App\Http\Controllers;

use App\Models\detalleCompra;
use App\Models\Compra;
use App\Models\detalleAlmacen;
use App\Models\producto;
use App\Models\almacen;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DetalleCompraController extends Controller
{
    public function index()
    {
        $detalleAs = DetalleAlmacen::all();
        $detalleCs =detalleCompra::all();
        $compras=compra::all();

        return view('detalleCo.index',compact('detalleAs','detalleCs','compras'));
    }

    public function create()
    { 
        $compras=compra::all();
        $detalleAs=detalleAlmacen::all();
        $productos=producto::all();
        $almacenes=almacen::all();
        return view('detalleCo.create',compact('compras','productos','almacenes','detalleAs'));
    }
    public function massCreate()
{
    $faker = Faker::create();
    $compras = DB::table('compras')->pluck('id_compra')->toArray();
    $productos = DB::table('productos')->pluck('id_producto')->toArray();

    $detallesCompra = [];

    for ($i = 0; $i < 200; $i++) { // Generar 200 registros, por ejemplo
        $id_compra = $faker->randomElement($compras);
        $id_producto = $faker->randomElement($productos);

        $existe = DB::table('detalle_compras')
            ->where('id_compra', $id_compra)
            ->where('idDal', $id_producto)
            ->exists();

        if (!$existe) {
            $detallesCompra[] = [
                'id_compra' => $id_compra,
                'idDal' => $id_producto,
                'precioDc' => $faker->randomFloat(2, 10, 1000), // Precio entre 10 y 1000
                'cantidadDc' => $faker->numberBetween(1, 200), // Cantidad entre 1 y 200
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }

    if (!empty($detallesCompra)) {
        DB::table('detalle_compras')->insert($detallesCompra);
        return count($detallesCompra) . " detalles de compras generados e insertados exitosamente.";
    }

    return "No se generaron detalles de compras porque todas las combinaciones ya existían.";
}

    public function edit($id1, $id2)
    {
        $detalleC=detalleCompra::where('idDc',$id1)->where('idDal',$id2)->first();
        $productos=producto::all();
        $detalleAs=detalleAlmacen::all();
        $almacenes=almacen::all();
        $compras=compra::all();
        return view('detalleCo.edit',compact('compras','productos','almacenes','detalleC','detalleAs'));
      
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $detalleCompra = DetalleCompra::create($request->all());
        $detallaAlmacen=detalleAlmacen::find($request->get("idDal"));
        $sum1=$detallaAlmacen->stock;
        $sum2=$detalleCompra->get("cantidadDc");
        //$sun3=$sum1+$sum2;
        //$detallaAlmacen->stock=$sum1+$sum2;
        //$detallaAlmacen->save();
        return redirect("/detalleCo");
    }

    public function update(Request $request, $id1,$id2)
    {
        //dd($request->all());
        $detalleCompra = DetalleCompra::where('idDc',$id1)->where('idDal',$id2)->first();
        $detalleCompra->update($request->all());
        return redirect('/detalleCo');
    }

    public function destroy($id1,$id2)
    {
        $detalleCompra = DetalleCompra::where('idDc',$id1)->where('idDal',$id2);
        $detalleCompra->delete();
        return redirect('/detalleCo');
    }
}
