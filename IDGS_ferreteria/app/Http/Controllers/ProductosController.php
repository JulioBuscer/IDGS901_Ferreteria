<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\proveedor_prodcuto;
use App\Models\Proveedor;
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
        $prov = Proveedor::all();


        return view('productos.vista', compact('table', 'table2', 'select','prov'));
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
            'slcCategoria' => 'required',
            'txtPrecio' => 'required',
            'txtCantidad' => 'required',
            'txtUnidad' => 'required'
        ]);

        DB::beginTransaction();

        $registroProductos = new ProductoModel();
        $registroProductos->nombre = $request->nombreProducto;
        $registroProductos->descripcion = $request->txtDescripcion;
        $registroProductos->precio = $request->txtPrecio;
        $registroProductos->cantidad = $request->txtCantidad;
        $registroProductos->unidad = $request->txtUnidad;
        $registroProductos->fotografia = $request->textarea;
        $registroProductos->active = "1";
        $registroProductos->idCategoria = $request->slcCategoria;
        $registroProductos->save();

        DB::commit();

        Session::flash('message', 'Producto creado!');
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
    public function edit($id)
    {
        //
        $del = ProductoModel::find($id);
        $del->active = 1;

        $del->save();
        Session::flash('message', 'estatus activo!');
        return redirect::to('Productos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductoModel  $productoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'idProd' => 'required',
            'nombreProducto0' => 'required|min:3|max:110',
            'txtDescripcion0' => 'required|min:3|max:220',
            'slcCategoria10' => 'required',
            'txtPrecio0' => 'required',
            'txtCantidad0' => 'required',
            'txtUnidad0' => 'required'
        ]);

        DB::beginTransaction();
        $actualCat = ProductoModel::find($id);
        $actualCat->nombre = $request->nombreProducto0;
        $actualCat->descripcion = $request->txtDescripcion0;
        $actualCat->precio = $request->txtPrecio0;
        $actualCat->cantidad = $request->txtCantidad0;
        $actualCat->unidad = $request->txtUnidad0;
        $actualCat->fotografia = $request->textarea0;
        $actualCat->active = "1";
        $actualCat->idCategoria = $request->slcCategoria10;
        $actualCat->save();


        DB::commit();


        Session::flash('message', 'Producto editado!');
        return redirect::to('Productos');
        //

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
        Session::flash('message', 'estatus desactivado!');
        return redirect::to('Productos');
    }
}
