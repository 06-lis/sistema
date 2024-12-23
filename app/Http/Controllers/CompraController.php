<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\empleado;
use App\Models\proveedor;
use App\Models\detalleAlmacen;
use App\Models\detalleCompra;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        $proveedors=proveedor::all();
        $empleados=empleado::all();
        $detalleCs=detalleCompra::all();
        $detalleAs=detalleAlmacen::all();
        $productos=producto::all();
        return view('compra.index',compact('compras','proveedors','empleados','detalleCs','detalleAs','productos'));
    }
    public function create()
    {
        $proveedors=proveedor::all();
        $empleados=empleado::all();
        $detalleCs=detalleCompra::all();
        $detalleAs=detalleAlmacen::all();
        $productos=producto::all();
        return view('compra.create',compact('proveedors','empleados','detalleCs','detalleAs','productos'));
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
