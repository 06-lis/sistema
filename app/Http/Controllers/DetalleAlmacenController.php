<?php

namespace App\Http\Controllers;

use App\Models\detalleAlmacen;
use App\Models\almacen;
use App\Models\producto;
use Illuminate\Http\Request;

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
    public function edit($id)
    {   
        $almacens =almacen::all();
        $productos=producto::all();
        $detalle = DetalleAlmacen::findOrFail($id);
        return view('detalleAl.edit',compact('detalle','productos','almacenes'));
    }

    public function store(Request $request)
    {
        $detalle =new  DetalleAlmacen();
        $detalle->stock=$request->get('stock');
        $detalle->id_producto=$request->get('id_producto');
        $detalle->id_almacen=$request->get('id_almacen');
        $detalle->save();
        return redirect('/detalleAl');
    }

    public function update(Request $request, $id)
    {
        $detalleAlmacen = DetalleAlmacen::findOrFail($id);
        $detalleAlmacen->update($request->all());
        return redirect('/detalleAl');
    }

    public function destroy($id)
    {
        $detalleAlmacen = DetalleAlmacen::findOrFail($id);
        $detalleAlmacen->delete();
        return redirect('/detalleAl');
    }
}
