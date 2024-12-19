<?php
// app/Http/Controllers/EmpleadoController.php
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Login;
use App\Models\TipoEmpleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados= empleado::all();
        return view('empleado.index')->with('empleados',$empleados);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleados = new Empleado();
            $empleados->nombreEm = $request->get('nombreEm');
            $empleados->apellidosEm = $request->get('apellidosEm');
            $empleados->sueldoEm = $request->get('sueldoEm');
            $empleados->telefonoEm = $request->get('telefonoEm');
            $empleados->direccion = $request->get('direccion');
            $empleados->id_tipoE = $request->get('id_tipoE');
            
            $empleados->save();

        return redirect('/empleado');    
    }
    
    public function edit($id)
    {
            $empleado= empleado::find($id);
            return view('empleado.edit')->with('empleado', $empleado);
    }

    public function update(request $request, $id)
    {
        $empleado = Empleado::find($id);

        $empleado->nombreEm = $request->get('nombreEm');
        $empleado->apellidosEm = $request->get('apellidosEm');
        $empleado->sueldoEm = $request->get('sueldoEm');
        $empleado->telefonoEm = $request->get('telefonoEm');
        $empleado->direccion = $request->get('direccion');
        $empleado->id_tipoE = $request->get('id_tipoE');
            
        $empleado->save();

        return redirect('/empleado'); 
    }

    public function destroy($id)
    {
        $empleado= empleado::find($id);
        $empleado->delete();
        return redirect('/empleado');
    }
   
}
