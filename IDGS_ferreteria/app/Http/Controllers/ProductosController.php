<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sql = 'SELECT * FROM producto WHERE active = 1';
        $table = Db::select($sql);
        $sql2 = 'SELECT * FROM producto WHERE active = 0';
        $table2 = Db::select($sql2);
        $select = CategoriaModel::all();
        return view('productos.vista', compact('table', 'table2','select'));
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
            'nombreProducto' => 'required|min:3|max:30',
            'txtDescripcion' => 'required|min:3|max:80',
            'slcCategoria' => 'required|min:1|max:30',
            'txtPrecio' => 'required|min:1|max:30',
            'txtCantidad' => 'required|min:3|max:30',
            'txtUnidad' => 'required|min:3|max:30'
        ]);

        $registroProductos =new ProductoModel();
        $registroProductos->nombre = $request->nombreProducto;
        $registroProductos->descripcion = $request->txtDescripcion;
        $registroProductos->precio = $request->txtPrecio;
        $registroProductos->cantidad = $request->txtCantidad;
        $registroProductos->unidad = $request->txtUnidad;
        $registroProductos->fotografia = $request->textarea;
        $registroProductos->active = "1";
        $registroProductos->idCategoria = $request->slcCategoria;

        $registroProductos->save();
        Session::flash('message','usuario creado!');
        return redirect::to('Productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoModel $productoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoModel $productoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoModel $productoModel)
    {
        //
        // $validateData = $request->validate([
        //     'idCat'=> 'required',
        //     'nombreCat' => 'required|min:3|max:30',
        //     'descripcionCat' => 'required|min:3|max:50'
        // ]);

        // $actualCat = CategoriaModel::find($id);
        // $actualCat->nombre = $request->nombreCat;
        // $actualCat->descripcion = $request->descripcionCat;

        // $actualCat->save();
        // Session::flash('message','usuario creado!');
        // return redirect::to('Categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $del = ProductoModel::find($id);
        $del->active = 0;

        $del->save();
        Session::flash('message','usuario creado!');
        return redirect::to('Productos');
    }

    
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        //
        $act = ProductoModel::find($id);
        $act->active = 1;

        $act->save();
        Session::flash('message','usuario creado!');
        return redirect::to('Productos');
    }
}
