<?php

namespace App\Http\Controllers;

use App\Models\detalleVenta;
use App\Models\detalleAlmacen;
use App\Models\venta;
use App\Models\producto;
use App\Models\almacen;
use Illuminate\Http\Request;

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
