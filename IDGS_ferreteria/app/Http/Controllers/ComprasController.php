<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\detalle_compra;
use App\Models\ProductoModel;
use App\Models\Proveedor;
use App\Models\User;
use DetalleCompra;
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
        $compras = Compras::orderBy('id', 'ASC')->get();
        $detalles_compras = detalle_compra::orderBy('idCompra', 'ASC')->get();

        $compras_completas = [];
        $cont = 0;
        $detener = false;
        foreach ($compras as $compra) {
            $temp_detalle = [];

            for ($cont; $cont < count($detalles_compras); $cont++) {
                if ($detalles_compras[$cont]->idCompra == $compra->id) {
                    $tmp_prod = ProductoModel::find($detalles_compras[$cont]->idProducto);
                    $item = [
                        'Producto' => $tmp_prod->nombre,
                        'Precio' => $detalles_compras[$cont]->precio,
                        'Cantidad' => $detalles_compras[$cont]->cantidad,
                        'Subtotal' => $detalles_compras[$cont]->precio * $detalles_compras[$cont]->cantidad
                    ];
                    array_push($temp_detalle, $detalles_compras[$cont]);
                } else $detener = true;
                if ($detener) break;
            }
            $tmp_prov = Proveedor::find($compra->idProveedor);
            $tmp_usr = User::find($compra->idUser);
            $tmp_comp = [
                'id' => $compra->id,
                'Proveedor' => $tmp_prov->empresa,
                'Descripcion' => $compra->descripcion,
                'Total' => $compra->total,
                'FechaPedido' => $compra->fechaPedido,
                'FechaEntrega' => $compra->fechaEntrega,
                'Empleado' => $tmp_usr->name,
                'status' => $compra->estatus
            ];
            $temp = ['Compra' => $tmp_comp, 'Detalle' => $temp_detalle];
            array_push($compras_completas, $temp);
        }

        return view('compras.index ', compact('modelo', 'proveedores', 'compras', 'detalles_compras', 'compras_completas'));
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
            case 4:
                $total = 0;
                $carrito = session('carrito');
                try {

                    foreach ($carrito as $item) {
                        $total +=  ($item['Precio'] * $item['Cantidad']);
                    }

                    $mCompra = new Compras();
                    $mCompra->total = $total;
                    $mCompra->fechaPedido = now(); //$request->fechaPedido;
                    $mCompra->fechaEntrega = " "; //$request->fechaEntrega;
                    $mCompra->estatus = 1;
                    $mCompra->descripcion = "N/A";
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
                    $request->session()->flash('message', 'Compra Agregada');
                } catch (\Throwable $th) {

                    $request->session()->flash('message', 'Compra No Agregada' . $th);
                }
                $carrito = [];
                session(["carrito" => $carrito]);

                return FacadesRedirect::to('compras');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show($compras)
    {
        $modelo = [];
        return view('compras.show', compact('modelo'));
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
