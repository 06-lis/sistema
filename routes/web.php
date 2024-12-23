<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoEmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleAlmacenController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\InformeController;
use GuzzleHttp\Client;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();



Route::middleware('auth')->group(function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

    //rutas de empleado
    route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
    route::get('/empleado/crear', [EmpleadoController::class, 'create'])->name('empleado.create');
    route::get('/empleado/massCreate', [EmpleadoController::class, 'massCreate'])->name('empleado.massCreate');
    route::post('/empleado/guardar',[EmpleadoController::class, 'store'])->name('empleado.store');
    route::get('/empleado/{id}/editar',[EmpleadoController::class, 'edit'])->name('empleado.edit');
    route::Put('/empleado/{id}/actualizar', [EmpleadoController::class, 'update'])->name('empleado.update');
    route::delete('/empleado/{id}/eliminar', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
    //rutas de venta
    route::get('/venta', [VentaController::class, 'index'])->name('venta.index');
    route::get('/venta/crear', [VentaController::class, 'create'])->name('venta.create');
    route::get('venta/massCreate', [VentaController::class, 'massCreate'])->name('venta.massCreate');
    route::post('/venta/guardar',[VentaController::class, 'store'])->name('venta.store');
    route::get('/venta/{id}/editar',[VentaController::class, 'edit'])->name('venta.edit');
    route::Put('/venta/{id}/actualizar', [VentaController::class, 'update'])->name('venta.update');
    route::delete('/venta/{id}/eliminar', [VentaController::class, 'destroy'])->name('venta.destroy');
    //rutas de cliente
    route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    route::get('/cliente/crear', [ClienteController::class, 'create'])->name('cliente.create');
    route::get('cliente/massCreate', [ClienteController::class, 'massCreate'])->name('cliente.massCreate');
    route::post('/cliente/guardar',[ClienteController::class, 'store'])->name('cliente.store');
    route::get('/cliente/{id}/editar',[ClienteController::class, 'edit'])->name('cliente.edit');
    route::Put('/cliente/{id}/actualizar', [ClienteController::class, 'update'])->name('cliente.update');
    route::delete('/cliente/{id}/eliminar', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    //rutas para proveedores
    route::get('/proveedor', [ProveedorController::class, 'index'])->name('proveedor.index');
    route::get('/proveedor/crear', [ProveedorController::class, 'create'])->name('proveedor.create');
    route::get('/proveedor/massCreate', [ProveedorController::class, 'massCreate'])->name('proveedor.massCreate');
    route::post('/proveedor/guardar',[ProveedorController::class, 'store'])->name('proveedor.store');
    route::get('/proveedor/{id}/editar',[ProveedorController::class, 'edit'])->name('proveedor.edit');
    route::Put('/proveedor/{id}/actualizar', [ProveedorController::class, 'update'])->name('proveedor.update');
    route::delete('/proveedor/{id}/eliminar', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
    //rutas para categorias
    route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    route::get('/categoria/crear', [CategoriaController::class, 'create'])->name('categoria.create');
    route::get('/categoria/massCreate', [CategoriaController::class, 'massCreate'])->name('categoria.massCreate');
    route::post('/categoria/guardar',[CategoriaController::class, 'store'])->name('categoria.store');
    route::get('/categoria/{id}/editar',[CategoriaController::class, 'edit'])->name('categoria.edit');
    route::Put('/categoria/{id}/actualizar', [CategoriaController::class, 'update'])->name('categoria.update');
    route::delete('/categoria/{id}/eliminar', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    //rutas para tipos de empleado
    route::get('/tipo', [TipoEmpleadoController::class, 'index'])->name('tipo.index');
    route::get('/tipo/crear', [TipoEmpleadoController::class, 'create'])->name('tipo.create');
    route::post('/tipo/guardar',[TipoEmpleadoController::class, 'store'])->name('tipo.store');
    route::get('/tipo/{id}/editar',[TipoEmpleadoController::class, 'edit'])->name('tipo.edit');
    route::Put('/tipo/{id}/actualizar', [TipoEmpleadoController::class, 'update'])->name('tipo.update');
    route::delete('/tipo/{id}/eliminar', [TipoEmpleadoController::class, 'destroy'])->name('tipo.destroy');
    //rutas para almacene
    route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');
    route::get('/almacen/crear', [AlmacenController::class, 'create'])->name('almacen.create');
    route::post('/almacen/guardar',[AlmacenController::class, 'store'])->name('almacen.store');
    route::get('/almacen/{id}/editar',[AlmacenController::class, 'edit'])->name('almacen.edit');
    route::Put('/almacen/{id}/actualizar', [AlmacenController::class, 'update'])->name('almacen.update');
    route::delete('/almacen/{id}/eliminar', [AlmacenController::class, 'destroy'])->name('almacen.destroy');
    //rutas para producto
    route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    route::get('/producto/crear', [ProductoController::class, 'create'])->name('producto.create');
    route::get('/producto/massCreate', [ProductoController::class, 'massCreate'])->name('producto.massCreate');
    route::post('/producto/guardar',[ProductoController::class, 'store'])->name('producto.store');
    route::get('/producto/{id}/editar',[ProductoController::class, 'edit'])->name('producto.edit');
    route::Put('/producto/{id}/actualizar', [ProductoController::class, 'update'])->name('producto.update');
    route::delete('/producto/{id}/eliminar', [ProductoController::class, 'destroy'])->name('producto.destroy');
    //rutas para compra
    route::get('/compra', [CompraController::class, 'index'])->name('compra.index');
    route::get('/compra/crear', [CompraController::class, 'create'])->name('compra.create');
    route::get('/compra/massCreate', [CompraController::class, 'massCreate'])->name('compra.massCreate');
    route::post('/compra/guardar',[CompraController::class, 'store'])->name('compra.store');
    route::get('/compra/{id}/editar',[CompraController::class, 'edit'])->name('compra.edit');
    route::Put('/compra/{id}/actualizar', [CompraController::class, 'update'])->name('compra.update');
    route::delete('/compra/{id}/eliminar', [CompraController::class, 'destroy'])->name('compra.destroy');
    //rutas para detalle almacen
    route::get('/detalleAl', [DetalleAlmacenController::class, 'index'])->name('detalleAl.index');
    route::get('/detalleAl/crear', [DetalleAlmacenController::class, 'create'])->name('detalleAl.create');
    route::get('/detalleAl/massCreate', [DetalleAlmacenController::class, 'massCreate'])->name('detalleAl.massCreate');
    route::post('/detalleAl/guardar',[DetalleAlmacenController::class, 'store'])->name('detalleAl.store');
    route::get('/detalleAl/{id1}/{id2}/editar',[DetalleAlmacenController::class, 'edit'])->name('detalleAl.edit');
    route::Put('/detalleAl/{id1}/{id2}/actualizar', [DetalleAlmacenController::class, 'update'])->name('detalleAl.update');
    route::delete('/detalleAl/{id1}/{id2}/eliminar', [DetalleAlmacenController::class, 'destroy'])->name('detalleAl.destroy');
    //rutas para detalle venta
    route::get('/detalleVe', [DetalleVentaController::class, 'index'])->name('detalleVe.index');
    route::get('/detalleVe/crear', [DetalleVentaController::class, 'create'])->name('detalleVe.create');
    route::get('/detalleVe/massCreate', [DetalleVentaController::class, 'massCreate'])->name('detalleVe.massCreate');
    route::post('/detalleVe/guardar',[DetalleVentaController::class, 'store'])->name('detalleVe.store');
    route::get('/detalleVe/{id1}/{id2}/editar',[DetalleVentaController::class, 'edit'])->name('detalleVe.edit');
    route::Put('/detalleVe/{id1}/{id2}/actualizar', [DetalleVentaController::class, 'update'])->name('detalleVe.update');
    route::delete('/detalleVe/{id1}/{id2}/eliminar', [DetalleVentaController::class, 'destroy'])->name('detalleVe.destroy');
    //rutas para detalle compra
    route::get('/detalleCo', [DetalleCompraController::class, 'index'])->name('detalleCo.index');
    route::get('/detalleCo/crear', [DetalleCompraController::class, 'create'])->name('detalleCo.create');
    route::get('/detalleCo/massCreate', [DetalleCompraController::class, 'massCreate'])->name('detalleCo.massCreate');
    route::post('/detalleCo/guardar',[DetalleCompraController::class, 'store'])->name('detalleCo.store');
    route::get('/detalleCo/{id1}/{id2}/editar',[DetalleCompraController::class, 'edit'])->name('detalleCo.edit');
    route::Put('/detalleCo/{id1}/{id2}/actualizar', [DetalleCompraController::class, 'update'])->name('detalleCo.update');
    route::delete('/detalleCo/{id1}/{id2}/eliminar', [DetalleCompraController::class, 'destroy'])->name('detalleCo.destroy');
});
