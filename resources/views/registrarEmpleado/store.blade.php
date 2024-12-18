<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombreEm' => 'required|string|max:30',
            'apellidosEm' => 'required|string|max:60',
            'puestoEm' => 'required|string|max:30',
            'telefonoEm' => 'required|integer',
            'direccion' => 'required|string|max:60',
            'id_tipoE' => 'required|exists:tipo_empleados,id_tipoE',
            'usuario' => 'required|string|unique:logins,usuario|max:30',
            'contrasena' => 'required|string|min:6', // Asegúrate de que la contraseña tenga al menos 6 caracteres
        ]);

        // Crear un nuevo empleado
        $empleado = new Empleado([
            'nombreEm' => $request->input('nombreEm'),
            'apellidosEm' => $request->input('apellidosEm'),
            'puestoEm' => $request->input('puestoEm'),
            'telefonoEm' => $request->input('telefonoEm'),
            'direccion' => $request->input('direccion'),
            'id_tipoE' => $request->input('id_tipoE'),
            'usuario' => $request->input('usuario'),
            'contrasena' => Hash::make($request->input('contrasena')), // Hashear la contraseña antes de guardarla
        ]);

        // Guardar el empleado
        $empleado->save();

        // Crear un nuevo registro en la tabla login
        Login::create([
            'usuario' => $request->input('usuario'),
            'contraseña' => $empleado->contrasena, // Usa el campo 'contrasena' de $empleado
        ]);

        return redirect()->route('empleado.index')->with('success', 'Empleado creado correctamente');
    }
}