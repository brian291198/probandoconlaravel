<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
        /*  $tipo=Tipo::where('control','=','1')->where('titulo','like',$buscarpor.'%')->paginate($this::PAGINATION);
         $empleado=Empleado::where('control','=','1')->get();  */
         $empleado=Empleado::where('control','=','1')->where('nombre','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
         return view('Empleados.index',compact(/* 'tipo', */'empleado','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        /* $cargo=Cargo::where('control','=','1')->get();
        $sexo=Sexo::where('control','=','1')->get();
        $distrito=Distrito::where('control','=','1')->get();   */
        $empleado=Empleado::where('control','=','1')->get();
        /* return view('Empleados.create',compact('empleado','cargo','sexo','distrito')); */
        return view('Empleados.create',compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=request()->validate([

            'nombre'=>'required|max:60',
           /*  'apaterno'=>'required|max:60',
            'amaterno'=>'required|max:60', */
            'dni'=>'required|max:8',
            'edad'=>'required|max:3',
          /*   'telefono'=>'required|max:9',
            'direccion'=>'required|max:100',
            'email'=>'max:100', */
    
            ],
            [
            'nombre.required'=>'Ingrese el nombre del empleado',
            'nombre.max'=>'No exceder de 60 caracteres',
            /* 'apaterno.required'=>'Ingrese el apellido paterno',
            'apaterno.max'=>'No exceder de 60 caracteres',
            'amaterno.required'=>'Ingrese el apellido materno',
            'amaterno.max'=>'No exceder de 60 caracteres', */
            'dni.required'=>'Ingrese un número de DNI',
            'dni.max'=>'No exceder de 8 caracteres',
            'edad.required'=>'Ingrese un valor para la edad',
            'edad.max'=>'Fuera del rango permitido',
            /* 'telefono.required'=>'Ingrese un número telefónico',
            'telefono.max'=>'No exceder de 9 caracteres',
            'direccion.required'=>'Ingrese una dirección',
            'direccion.max'=>'No exceder de 100 caracteres',
            'email.max'=>'No exceder de 100 caracteres' */

           
            ]);
            $empleado=new Empleado();
            $empleado->nombre=$request->nombre;
            /* $empleado->apaterno=$request->apaterno;
            $empleado->amaterno=$request->amaterno; */
            $empleado->dni=$request->dni;
            $empleado->edad=$request->edad;
            /* $empleado->telefono=$request->telefono;
            $empleado->direccion=$request->direccion;
            $empleado->email=$request->email;
            $empleado->idCargo=$request->idCargo;
            $empleado->idSexo=$request->idSexo;
            $empleado->idDistrito=$request->idDistrito; */
            $empleado->control='1';
            $empleado->save();
   
              return redirect()->route('Empleados.index')->with('datos','Registro Nuevo Guardado...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
       /*  $cargo=Cargo::where('control','=','1')->get();
        $sexo=Sexo::where('control','=','1')->get();
        $distrito=Distrito::where('control','=','1')->get(); */
    
        return view('Empleados.edit',compact('empleado'/* ,'cargo','sexo','distrito' */));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([

            'nombre'=>'required|max:60',
            /* 'apaterno'=>'required|max:60',
            'amaterno'=>'required|max:60', */
            'dni'=>'required|max:8',
            'edad'=>'required|max:3',
            /* 'telefono'=>'required|max:9',
            'direccion'=>'required|max:100',
            'email'=>'max:100', */
    
            ],
            [
            'nombre.required'=>'Ingrese el nombre del empleado',
            'nombre.max'=>'No exceder de 60 caracteres',
            /* 'apaterno.required'=>'Ingrese el apellido paterno',
            'apaterno.max'=>'No exceder de 60 caracteres',
            'amaterno.required'=>'Ingrese el apellido materno',
            'amaterno.max'=>'No exceder de 60 caracteres', */
            'dni.required'=>'Ingrese un número de DNI',
            'dni.max'=>'No exceder de 8 caracteres',
            'edad.required'=>'Ingrese un valor para la edad',
            'edad.max'=>'Fuera del rango permitido',
           /*  'telefono.required'=>'Ingrese un número telefónico',
            'telefono.max'=>'No exceder de 9 caracteres',
            'direccion.required'=>'Ingrese una dirección',
            'direccion.max'=>'No exceder de 100 caracteres',
            'email.max'=>'No exceder de 100 caracteres' */

           
            ]);
        
            $empleado=Empleado::findOrFail($id);
            $empleado->nombre=$request->nombre;
           /*  $empleado->apaterno=$request->apaterno;
            $empleado->amaterno=$request->amaterno; */
            $empleado->dni=$request->dni;
            $empleado->edad=$request->edad;
            /* $empleado->telefono=$request->telefono;
            $empleado->direccion=$request->direccion;
            $empleado->email=$request->email;
            $empleado->idCargo=$request->idCargo;
            $empleado->idSexo=$request->idSexo;
            $empleado->idDistrito=$request->idDistrito; */
            $empleado->save();
   
              return redirect()->route('Empleados.index')->with('datos','Registro Nuevo Guardado...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        $empleado->control='0';
        $empleado->save();
        return redirect()->route('Empleados.index')->with('datos','Registro Eliminado...!');
    }
}
