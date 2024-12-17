<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Login;

class EmpleadoController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombreEm' => 'required|string|max:30',
            'apellidosEm' => 'required|string|max:60',
            'puestoEm' => 'required|string|max:30',
            'telefonoEm' => 'required|numeric',
            'direccion' => 'required|string|max:60',
            'id_tipoE' => 'required|integer',
            'usuario' => 'required|string|max:30|unique:login,usuario',
            'contraseña' => 'required|string|min:6',
        ]);

        // Guardar empleado
        $empleado = Empleado::create($request->only([
            'nombreEm',
            'apellidosEm',
            'puestoEm',
            'telefonoEm',
            'direccion',
            'id_tipoE',
        ]));

        // Guardar login asociado
        Login::create([
            'usuario' => $request->usuario,
            'contraseña' => bcrypt($request->contraseña), // Encriptar la contraseña
        ]);

        return redirect()->back()->with('success', 'Empleado registrado correctamente.');
    }
}

