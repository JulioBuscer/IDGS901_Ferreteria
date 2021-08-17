<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\ProductoModel;
use App\Models\Proveedores;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use SebastianBergmann\Environment\Console;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = 'SELECT p.id , p.empresa FROM proveedor as p 
INNER JOIN proveedor_producto as pp ON p.id= pp.idProveedor
WHERE active=1 group by p.id';
        $proveedores = Db::select($sql);
        $modelo = ProductoModel::find(0);
        // $proveedores = Proveedores::orderBy('empresa', 'ASC')->get();
        return view('compras.index ', compact('modelo', 'proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        switch ($request->option) {
            case 1:
                $id = $request->selectProveedor;
                $sql = 'SELECT pp.idProducto as id, p.nombre , pp.precioCompra 
        FROM proveedor_producto AS pp 
        INNER JOIN producto AS p ON (pp.idProducto=p.id) 
        WHERE active = 1 and pp.idProveedor =' . $id;
                $proveedorProductos = Db::select($sql);
                // $proveedorProductos = Proveedores::orderBy('empresa', 'ASC')->get();
                return ($proveedorProductos);
                break;
            case 2:

                $carrito = session('carrito');

                if (!$carrito) {
                    $carrito = [];
                }
                // $carrito = Arr::add($carrito, count($carrito), ['idProducto' => 2, 'Producto' => 'Tal']);
                $item = ['idProducto' => count($carrito), 'Producto' => 'Cual'];
                array_push($carrito, $item);

                session(["carrito" => $carrito]);
                return (session("carrito"));
                break;
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show(Compras $compras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function edit(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compras $compras)
    {
        //
    }
}
