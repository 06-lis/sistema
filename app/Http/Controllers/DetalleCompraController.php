<?php

namespace App\Http\Controllers;

use App\Models\detalleCompra;
use App\Models\Compra;
use App\Models\detalleAlmacen;
use App\Models\producto;
use App\Models\almacen;
use Illuminate\Http\Request;

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
