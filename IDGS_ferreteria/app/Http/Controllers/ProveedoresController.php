<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use App\Models\proveedor_prodcuto;
use App\Models\Proveedores;
use App\Models\ProveedoresProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Psy\Readline\HoaConsole;

use function PHPUnit\Framework\countOf;
use function Psy\debug;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sql = 'SELECT pp.id, pp.idProducto, pp.idProveedor, p.nombre, pp.precioCompra FROM proveedor_producto AS pp INNER JOIN producto AS p ON (pp.idProducto=p.id) WHERE active = 1';
        $proveedores_prodcutos = Db::select($sql);
        $modelo = Proveedores::find(0);
        $table = Proveedores::orderBy('empresa', 'ASC')->get();
        $productos = ProductoModel::orderBy('nombre', 'ASC')->get();
        return view('proveedores.index ', compact('modelo', 'table', 'productos',  'proveedores_prodcutos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $table = Proveedores::all();
        // return view('proveedores.create ', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->selectProveedor != null) {
            $validateData = $request->validate([
                'selectProveedor' => 'required',
                'selectProducto' => 'required',
                'costo' => 'required'
            ]);
            $mProovedoreProducto = new ProveedoresProductos();
            $mProovedoreProducto->idProducto = $request->selectProducto;
            $mProovedoreProducto->idProveedor = $request->selectProveedor;
            $mProovedoreProducto->precioCompra = $request->costo;

            $request->session()->flash('message', 'Producto Agregado a Proveedor');

            $mProovedoreProducto->save();
        } else {
            echo $request->empresa;

            $validateData = $request->validate([
                'empresa' => 'required|min:5',
                'direccion' => 'required|min:5',
                'email' => 'required|min:5',
                'representante' => 'required|min:5',
                'telefono' => 'required|min:5',
                'rfc' => 'required|min:5',
            ]);

            $mProveedores = new Proveedores();
            $mProveedores->empresa = $request->empresa;
            $mProveedores->direccion = $request->direccion;
            $mProveedores->email = $request->email;
            $mProveedores->representante = $request->representante;
            $mProveedores->telefono = $request->telefono;
            $mProveedores->RFC = $request->rfc;
            $mProveedores->active = 1;

            $request->session()->flash('message', 'Proveedor Agregado');

            $mProveedores->save();
        }


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
        $table = Proveedores::all();
        return view('proveedores.show ', compact('modelo', 'table'));
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
        $mProveedores = Proveedores::find($id);
        if ($mProveedores->active == 0) {
            $mProveedores->active = 1;
            $request->session()->flash('message', 'Proveedor Activado');
        } else {
            $validateData = $request->validate([
                'empresa' => 'required|min:5',
                'direccion' => 'required|min:5',
                'email' => 'required|min:5',
                'representante' => 'required|min:5',
                'telefono' => 'required|min:5',
                'RFC' => 'required|min:5'
            ]);

            $mProveedores->empresa = $request->empresa;
            $mProveedores->direccion = $request->direccion;
            $mProveedores->email = $request->email;
            $mProveedores->representante = $request->representante;
            $mProveedores->RFC = $request->RFC;
            $mProveedores->telefono = $request->telefono;
            $request->session()->flash('message', 'Proveedor Editado');
        }

        $mProveedores->save();
        return FacadesRedirect::to('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->idProducto) {
            $mProveedor_Producto = ProveedoresProductos::find($request->id);
            $mProveedor_Producto->delete();
            session()->flash('message', 'Producto Eliminado de Proveedor');
        } else {
            $mProveedores = Proveedores::find($id);
            $mProveedores->active = 0;
            $mProveedores->save();

            session()->flash('message', 'Proveedor Eliminado');
        }

        return FacadesRedirect::to('proveedores');
    }
}
