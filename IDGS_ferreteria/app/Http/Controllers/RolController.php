<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Session;
use Redirect;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Rol::all();
        return view('roles.vista', compact('table'));
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
            'nombrerol' => 'required|min:3|max:30',
            'descripcionrol' => 'required|min:3|max:50'
        ]);

        $registroRol =new Rol();
        $registroRol->nombre = $request->nombrerol;
        $registroRol->descripcion = $request->descripcionrol;

        $registroRol->save();
        Session::flash('message','usuario creado!');
        return redirect::to('Roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'idCat'=> 'required',
            'nombrerol1' => 'required|min:3|max:30',
            'descripcionRol1' => 'required|min:3|max:50'
        ]);

        $actualCat = Rol::find($id);
        $actualCat->nombre = $request->nombrerol1;
        $actualCat->descripcion = $request->descripcionRol1;

        $actualCat->save();
        Session::flash('message','Rol actulizado!');
        return redirect::to('Roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrarRol = Rol::find($id);
        $borrarRol->delete();

        Session::flash('message','Rol eliminado!');
        return redirect::to('Roles');
    }
}
