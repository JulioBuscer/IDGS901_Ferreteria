<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Proveedores::all();
        return view('proveedores.index ', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
            'empresa' => 'required|min:5',
            'direccion' => 'required|min:5',
            'email' => 'required|min:5',
            'representante' => 'required|min:5',
            'telefono' => 'required|min:5',
            'RFC' => 'required|min:5',
            'active' => 'required|min:5'
        ]);

        $mProveedores = new Proveedores();
        $mProveedores->empresa = $request->empresa;
        $mProveedores->direccion = $request->direccion;
        $mProveedores->email = $request->email;
        $mProveedores->representante = $request->representante;
        $mProveedores->telefono = $request->telefono;
        $mProveedores->RFC = $request->RFC;
        $mProveedores->active = 1;
        $mProveedores->save();

        $request->session()->flash('message', 'Proveedor Agregado');
        return FacadesRedirect::to('proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Proveedores::find($id);

        return view('proveedores.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $modelo = Proveedores::find($id);

        return view('proveedores.edit', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'empresa' => 'required|min:5',
            'direccion' => 'required|min:5',
            'email' => 'required|min:5',
            'representante' => 'required|min:5',
            'telefono' => 'required|min:5',
            'RFC' => 'required|min:5'
        ]);

        $mProveedores = Proveedores::find($id);
        $mProveedores->empresa = $request->empresa;
        $mProveedores->direccion = $request->direccion;
        $mProveedores->email = $request->email;
        $mProveedores->representante = $request->representante;
        $mProveedores->telefono = $request->telefono;
        $mProveedores->RFC = $request->RFC;
        $mProveedores->save();

        $request->session()->flash('message', 'Proveedor Editado');
        return FacadesRedirect::to('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mProveedores = Proveedores::find($id);
        $mProveedores->active = 0;
        $mProveedores->save();

        session()->flash('message', 'Proveedor Eliminado');
        return FacadesRedirect::to('proveedores');
    }
}
