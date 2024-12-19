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



Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();



Route::middleware('auth')->group(function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);

//registar empleado rutas
    route::get('/empleado', [EmpleadoController::class, 'index'])->name('home');
    route::get('/empleado/crear', [EmpleadoController::class, 'create'])->name('home');
    route::post('/empleado/guardar',[EmpleadoController::class, 'store'])->name('home');
    route::get('/empleado/{id}/editar',[EmpleadoController::class, 'edit'])->name('home');
    route::Put('/empleado/{id}/actualizar', [EmpleadoController::class, 'update'])->name('home');
    route::delete('/empleado/{id}/eliminar', [EmpleadoController::class, 'destroy'])->name('home');
});
