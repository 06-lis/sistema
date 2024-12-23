<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index')->with('productos',$productos);
    }

    public function create()
    {
        $categorias=categoria::all();
        return view('producto.create')->with('categorias',$categorias);
    }
    public function massCreate(Request $request)
    {
        $path = storage_path('app/Productos.json'); // Correctamente obtiene la ruta
        if (file_exists($path)) {
            $jsonContent = file_get_contents($path); // Lee el archivo
            $productos = json_decode($jsonContent, true); // Decodifica el JSON
        
            // Inserta cada categoría en la base de datos
            foreach ($productos as $producto) {
                DB::table('productos')->insert([
                    'nombrePr' => $producto['nombrePr'],
                    'nombreTecnico' => $producto['nombreTecnico'],
                    'descripcionPr' => $producto['descripcionPr'],
                    'compocicionQuimica' => $producto['compocicionQuimica'],
                    'consentracionQuimica' => $producto['consentracionQuimica'],
                    'fechaFabricacion' => $producto['fechaFabricacion'],
                    'fechaVencimiento' => $producto['fechaVencimiento'],
                    'unidadMedida' => $producto['unidadMedida'],
                    'id_categoria' => $producto['id_categoria'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            echo "Datos insertados correctamente.";
        } else {
            echo "El archivo no existe en la ruta especificada.";
        }
    }
    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return redirect('/producto');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = categoria::all();
        return view('producto.edit', compact('producto','categorias'));
    }

    
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect('/producto');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect('/producto');
    }
}
