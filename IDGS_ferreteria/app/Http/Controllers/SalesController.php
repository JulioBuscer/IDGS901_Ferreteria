<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaInventarioModel;
use App\Models\VentaModel;
use Cart;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\ProductoModel;
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
        return view('ventas.index', compact('ventas'));
        //
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