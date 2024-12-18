<?php
// app/Http/Controllers/EmpleadoController.php
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Login;
use App\Models\TipoEmpleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{

    public function index()
    {
        return view('registarEmpleado.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposEmpleados = TipoEmpleado::all(); // Traer todos los tipos de empleados para el selector
        return view('registrarEmpleado.create', compact('tiposEmpleados'));
    }

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
        $empleado = Empleado::create([
            'nombreEm' => $request->input('nombreEm'),
            'apellidosEm' => $request->input('apellidosEm'),
            'puestoEm' => $request->input('puestoEm'),
            'telefonoEm' => $request->input('telefonoEm'),
            'direccion' => $request->input('direccion'),
            'id_tipoE' => $request->input('id_tipoE'),
            'usuarui' => $request->input('usuario'), // Relacionar la tabla login con el id del empleado
        ]);

        // Crear un nuevo usuario y contraseña en la tabla login
        Login::create([
            'usuario' => $request->input('usuario'),
            'contraseña' => Hash::make($request->input('contrasena')), // Hashear la contraseña
 
        ]);

        return redirect()->route('registarEmpleado.index')->with('success', 'Empleado creado correctamente');
    }
}
