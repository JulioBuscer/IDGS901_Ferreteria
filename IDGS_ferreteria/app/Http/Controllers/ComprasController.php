<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\detalle_compra;
use App\Models\ProductoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;


class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session(["carrito" => []]);

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
        $carrito = session('carrito');
        switch ($request->option) {
            case 1:
                session(["carrito" => []]);
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
                $unico = true;

                if (!$carrito) $carrito = [];

                for ($i = 0; $i < count($carrito); $i++) {
                    if ($carrito[$i]['idProducto'] == $request->selectProducto) {
                        $carrito[$i]['Cantidad'] = $request->cantidad;
                        $unico = false;
                    }
                }

                if ($unico) {
                    $sql = "SELECT P.nombre , PP.precioCompra 
                    FROM producto P 
                    INNER JOIN proveedor_producto PP ON P.id = PP.idProducto
                    WHERE P.id=" . $request->selectProducto;
                    $producto = Db::select($sql);

                    $item = ['idProducto' => $request->selectProducto, 'Producto' => $producto[0]->nombre, 'Precio' =>  $producto[0]->precioCompra, 'Cantidad' => $request->cantidad];
                    array_push($carrito, $item);
                }
                session(["carrito" => $carrito]);
                return ($carrito);
                break;
            case 3:
                unset($carrito[$request->index]);
                session(["carrito" => $carrito]);
                return ($carrito);
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
        $total = 0;
        $carrito = session('carrito');

        foreach ($carrito as $item) {
            $total +=  ($item['Precio'] * $item['Cantidad']);
        }

        $mCompra = new Compras();
        $mCompra->total = $total;
        $mCompra->fechaPedido = "2021/05/10"; //$request->fechaPedido;
        $mCompra->fechaEntrega = "18/08/2021"; //$request->fechaEntrega;
        $mCompra->estatus = 1;
        $mCompra->idProveedor = $request->selectProveedor;
        $mCompra->idUser = Auth::user()->id;
        $mCompra->save();

        $mCompra = Compras::latest('id')->first();

        foreach ($carrito as $item) {
            $mDetalleCompra = new detalle_compra();
            $mDetalleCompra->cantidad = $item['Cantidad'];
            $mDetalleCompra->precio = $item['Precio'];
            $mDetalleCompra->idProducto = $item['idProducto'];
            $mDetalleCompra->idCompra = $mCompra['id'];
            $mDetalleCompra->save();
        }

        $request->session()->flash('message', 'Producto Agregado a Proveedor');

        return FacadesRedirect::to('compras');
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
