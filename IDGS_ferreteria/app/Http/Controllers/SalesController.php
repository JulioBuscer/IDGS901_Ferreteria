<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaInventarioModel;
use App\Models\Venta;
use Cart;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\ProductoModel;
use App\Notifications\RealTimeNotification;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sql = 'SELECT * FROM venta';
        $ventas = Db::select($sql);
        $ventas_inventario = Db::select('SELECT * FROM venta_inventario ORDER BY idVenta ASC');
        $ventas_completas = [];

        foreach ($ventas as $venta) {
            $temp_detalle = [];

            foreach ($ventas_inventario as $venta_inventario) {
                if ($venta_inventario->idVenta == $venta->id) {
                    $tmp_prod = ProductoModel::find($venta_inventario->idProducto);
                    $item = [
                        'idProducto' => $tmp_prod->id,
                        'Producto' => $tmp_prod->nombre,
                        'Precio' => $venta_inventario->precio,
                        'Cantidad' => $venta_inventario->cantidad,
                        'Subtotal' => $venta_inventario->precio * $venta_inventario->cantidad
                    ];
                    array_push($temp_detalle, $item);
                }
            }

            $tmp_cliente = Cliente::find($venta->idCliente);
            $tmp_usr = User::find($venta->idUsuario);
            $tmp_venta = [
                'id' => $venta->id,
                'Cantidad' => $venta->cantidad,
                'SubTotal' => $venta->subtotal,
                'Fecha' => $venta->fecha,
                'Iva' => $venta->iva,
                'Total' => $venta->total,
                'Empleado' => $tmp_usr->name,
                'Cliente' => $tmp_cliente->nombre,
                'Estatus' => $venta->estatus
            ];
            $temp = ['Venta' => $tmp_venta, 'Detalle' => $temp_detalle];
            array_push($ventas_completas, $temp);
        }

        return view('ventas.index', compact('ventas','ventas_inventario','ventas_completas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         try {
             
        if ($request->idSelected) {
            $mVenta = Venta::find($request->idSelected);
            
            switch ($request->opcion) {
                case "Cancelar":
                    $mVenta->estatus = 0;
                    $detalles_ventas = VentaInventarioModel::where('idVenta', $mVenta->id)->get();


                    foreach ($detalles_ventas as $detalle_venta) {
                        $tmp_prod = ProductoModel::find($detalle_venta->idProducto);
                        $cantTotal = floatval($detalle_venta->cantidad) + floatval($tmp_prod->cantidad);
                        $tmp_prod->cantidad = $cantTotal;
                        $tmp_prod->save();
                    }
                    $mVenta->save();
                    return back();
                    break;
            }
        }
         } catch (\Throwable $th) {
             return $th;
         }
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
        $date = new DateTime("now", new DateTimeZone('America/Mexico_City') );
        
        DB::beginTransaction();
        $registerSale = new VentaModel();
        $registerSale->cantidad = Cart::getTotalQuantity();
        $registerSale->subtotal = $request->subtotal;
        $registerSale->fecha = $date->format('Y-m-d H:i:s');
        $registerSale->iva = $request->iva;
        $registerSale->total = Cart::getTotal();
        $registerSale->idUsuario = Auth::user()->id;
        $registerSale->idCliente = $request->selectCliente;
        $registerSale->estatus = 1;
        $registerSale->save();
        foreach(Cart::getContent() as $row){
            $del = ProductoModel::find($row->id);
            $del->cantidad = floatval($del->cantidad) - floatval($row->quantity);
            $del->save();

            $ventaI = new VentaInventarioModel();
            $ventaI->idVenta= $registerSale->id;
            $ventaI->idProducto = $row->id;
            $ventaI->cantidad = $row->quantity;
            $ventaI->precio = $row->price;
            $ventaI->save();
        }
        $user = User::find(1);
        $user->notify(new RealTimeNotification("El usuario ".Auth::user()->name." termino una venta (No. ".$registerSale->id.")"));
        DB::commit();
        Cart::clear();
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}