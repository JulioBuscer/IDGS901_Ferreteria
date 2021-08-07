<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;
use Session;
use Redirect;

class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = CategoriaModel::all();

        return view('categorias.vista', compact('table'));
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
        //

        $validateData = $request->validate([
            'nombreCategoria' => 'required|min:3|max:30',
            'descripcionCategoria' => 'required|min:3|max:50'
        ]);

        $registroCategorias = new CategoriaModel();
        $registroCategorias->nombre = $request->nombreCategoria;
        $registroCategorias->descripcion = $request->descripcionCategoria;

        $registroCategorias->save();
        Session::flash('message', 'usuario creado!');
        return redirect::to('Categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function edit($edt)
    {
        //
        // $ed = CategoriaModel::find($edt);
        //return redirect::to('Categorias',compact('row'));
        // return view('categorias.vista',compact('ed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'idCat' => 'required',
            'nombreCat' => 'required|min:3|max:30',
            'descripcionCat' => 'required|min:3|max:50'
        ]);

        $actualCat = CategoriaModel::find($id);
        $actualCat->nombre = $request->nombreCat;
        $actualCat->descripcion = $request->descripcionCat;

        $actualCat->save();
        Session::flash('message', 'usuario creado!');
        return redirect::to('Categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrarCategoria = CategoriaModel::find($id);
        $borrarCategoria->delete();


        Session::flash('message', 'usuario eliminado!');
        return redirect::to('Categorias');
    }
}
