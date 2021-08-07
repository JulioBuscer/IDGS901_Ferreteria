<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = 'SELECT u.id,u.email,u.fotografia,p.id as idPersona, p.nombre, p.apellidoP,p.apellidoM,p.telefono,r.id  as idRol, r.nombre as nombreRol, r.descripcion FROM users AS u INNER JOIN persona AS p ON (u.id_persona = p.id) INNER JOIN rol AS r ON (u.id_rol = r.id) WHERE active = 1;';
        $table = Db::select($sql);
        $sql2 = 'SELECT u.id,u.email,u.fotografia,p.id as idPersona, p.nombre, p.apellidoP,p.apellidoM,p.telefono,r.id  as idRol, r.nombre as nombreRol, r.descripcion FROM users AS u INNER JOIN persona AS p ON (u.id_persona = p.id) INNER JOIN rol AS r ON (u.id_rol = r.id) WHERE active = 0;';
        $table2 = Db::select($sql2);
        $select = Rol::all();

        return view('empleados.vista', compact('table','table2','select'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $mUsers->password = bcrypt($request->password);

        $validateData = $request->validate([
            'nombre' => 'required|min:3|max:30',
            'App' => 'required|min:3|max:80',
            'Apm' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'password' => 'required',
            'slcRol' => 'required'
        ]);

        DB::beginTransaction();

        $registroPersona =new Persona();
        $registroPersona->nombre = $request->nombre;
        $registroPersona->apellidoP = $request->App;
        $registroPersona->apellidoM = $request->Apm;
        $registroPersona->telefono = $request->tel;
        $registroPersona->save();

        $registroEmpleado =new Empleado();
        $registroEmpleado->name = $request->nombre;
        $registroEmpleado->email = $request->email;
        $registroEmpleado->password = bcrypt($request->password);
        $registroEmpleado->active = "1";
        $registroEmpleado->token = "1";
        $registroEmpleado->fotografia = $request->textarea;
        $registroEmpleado->id_rol = $request->slcRol;
        $registroEmpleado->id_persona = $registroPersona->id;
        $registroEmpleado->save();


        DB::commit();

        Session::flash('message','Producto creado!');
        return redirect::to('Empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
