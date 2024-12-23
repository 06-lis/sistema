<?php
// app/Http/Controllers/EmpleadoController.php
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Login;
use App\Models\TipoEmpleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

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
        $tipos=TipoEmpleado::all();
        return view('empleado.create',compact('tipos'));
    }

    public function massCreate()
    {
        $faker = faker::create();
        $empleados = [];
        for ($i = 0; $i < 100; $i++) {
            $empleados[] = [
            'nombreEm' => $faker->firstName,
            'apellidosEm' => $faker->lastName,
            'sueldoEm' => $faker->numberBetween(1000, 5000),
            'telefonoEm' => $faker->numerify('6######'),
            'direccion' => substr($faker->address, 0,40),
            'id_tipoE' => $faker->numberBetween(2, 3),
            'created_at' => now(),  
            'updated_at' => now()
            ];
        }
        DB::table('empleados')->insert($empleados);
        return view('empleado.index')->with('success', 'Empleados creados exitosamente');
    }
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
            $tipos=TipoEmpleado::all();
            return view('empleado.edit',compact('empleado','tipos'));
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
