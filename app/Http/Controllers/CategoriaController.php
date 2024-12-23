<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index')->with('categorias',$categorias);
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function massCreate(){
    $path = storage_path('app/Categorias.json'); // Correctamente obtiene la ruta
    if (file_exists($path)) {
        $jsonContent = file_get_contents($path); // Lee el archivo
        $categorias = json_decode($jsonContent, true); // Decodifica el JSON
    
        // Inserta cada categoría en la base de datos
        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombreCat' => $categoria['nombreCat'],
                'descripcionCat' => $categoria['descripcionCat'],
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
        $categoria = Categoria::create($request->all());
        return redirect('/categoria');
    }

    public function edit($id)
    {
        $categoria=categoria::find($id);
        return view('categoria.edit')->with('categoria',$categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect('/categoria');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categoria');
    }
}
