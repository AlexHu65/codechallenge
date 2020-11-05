<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Empleados;
use Session;

class EmpleadosController extends Controller
{

    public function index(Request $request){

        // detalle
        $data = [
            'empleado' => $empleado = Empleados::find($request->id)->first()
        ];

        return view('empleado' , $data);




    }

    public function store(Request $request){

        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'salarioDolares' => 'numeric',
            'salarioPesos' => 'numeric',
            'direccion' => 'required|max:250',
            'estado' => 'required|max:50',
            'ciudad' => 'required|max:50',
            'telefono' => 'required|max:10',
            'correo' => 'required|email',
        ]);

        $empleados = new Empleados;

        $empleados->codigo = $request->codigo;
        $empleados->nombre = $request->nombre;
        $empleados->salarioDolares = $request->salarioDolares;
        $empleados->salarioPesos = $request->salarioPesos;
        $empleados->direccion = $request->direccion;
        $empleados->estado = $request->estado;
        $empleados->ciudad = $request->ciudad;
        $empleados->telefono = $request->telefono;
        $empleados->correo = $request->correo;
        $empleados->activo = ($request->activo ? 1 : 0);

        if($empleados->save()){
            Session::flash('message', 'Empleado guardado con éxito');
            return redirect('home');
        }
    }

    public function delete(Request $request){
        if(Empleados::find($request->input('id'))->delete()){

            Session::flash('message', 'Empleado borrado con éxito');
            return response()->json([
                'deleted' => true,
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }

    public function active(Request $request){
        if(Empleados::where(['id' => $request->input('id')])->update(['activo' => 1])){

            Session::flash('message', 'Empleado actualizado con éxito');
            return response()->json([
                'updated' => true,
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }

}
