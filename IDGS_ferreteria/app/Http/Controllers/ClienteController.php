<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = 'SELECT c.id,c.rfc,c.direccion, c.correo, p.id as idPersona, p.nombre, p.apellidoP,p.apellidoM,p.telefono FROM cliente AS c INNER JOIN persona AS p ON (c.idPersona = p.id) WHERE active = 1;';
        $table = Db::select($sql);
        $sql2 = 'SELECT c.id,c.rfc,c.direccion, c.correo, p.id as idPersona, p.nombre, p.apellidoP,p.apellidoM,p.telefono FROM cliente AS c INNER JOIN persona AS p ON (c.idPersona = p.id) WHERE active = 0;';
        $table2 = Db::select($sql2);

        return view('Clientes.vista', compact('table', 'table2'));
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
        $validateData = $request->validate([
            'nombre' => 'required|min:3|max:30',
            'App' => 'required|min:3|max:80',
            'Apm' => 'required',
            'tel' => 'required',
            'rfc    ' => 'required',
            'direccion' => 'required',
            'email' => 'required'
        ]);

        DB::beginTransaction();

        $registroPersona = new Persona();
        $registroPersona->nombre = $request->nombre;
        $registroPersona->apellidoP = $request->App;
        $registroPersona->apellidoM = $request->Apm;
        $registroPersona->telefono = $request->tel;
        $registroPersona->save();

        $registroCliente = new Cliente();
        $registroCliente->rfc = $request->rfc;
        $registroCliente->direccion = $request->direccion;
        $registroCliente->correo = $request->email;
        $registroCliente->active = "1";
        $registroCliente->idPersona = $registroPersona->id;
        $registroCliente->save();


        DB::commit();

        Session::flash('message', 'Cliente creado!');
        return redirect::to('Clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $del = Cliente::find($id);
        $del->active = 1;

        $del->save();
        Session::flash('message', 'Cliente activo!');
        return redirect::to('Clientes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $registroPersona = Persona::find($request->idPer);
        $registroPersona->nombre = $request->nombre1;
        $registroPersona->apellidoP = $request->App1;
        $registroPersona->apellidoM = $request->Apm1;
        $registroPersona->telefono = $request->tel1;
        $registroPersona->save();


        $registroCliente = Cliente::find($id);
        $registroCliente->rfc = $request->rfc1;
        $registroCliente->direccion = $request->direccion1;
        $registroCliente->correo = $request->email1;
        $registroCliente->active = "1";
        $registroCliente->idPersona = $registroPersona->id;
        $registroCliente->save();


        DB::commit();
        Session::flash('message', 'Cliente Actualizado!');
        return redirect::to('Clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Cliente::find($id);
        $del->active = 0;

        $del->save();
        Session::flash('message', 'Cliente Eliminado!');
        return redirect::to('Clientes');
    }
}
