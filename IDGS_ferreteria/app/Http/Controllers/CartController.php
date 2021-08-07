<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $toClient = "SELECT cliente.id, concat(p.nombre, ' ', p.apellidoP, ' ', p.apellidoM) as nombre, cliente.direccion, cliente.rfc  FROM persona p INNER JOIN cliente ON cliente.idPersona = p.id";
        // $clients = Db::select($toClient);

        $clients = DB::table('persona')
        ->join('cliente','cliente.idPersona','=','persona.id')
        ->select('cliente.id', DB::raw("concat(persona.nombre, ' ', persona.apellidoP, ' ', persona.apellidoM) as nombre")
        ,'cliente.direccion', 'cliente.rfc')->get();
        
        

        // echo var_dump($clients);
        $clientes = $clients->pluck('nombre', 'id')->prepend('Seleccionar cliente...');
        echo var_dump($clientes);
        return view('site.cart_details', compact('clientes'));
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
        $cartCollection = Cart::getContent();
        if($cartCollection->count() > 0){
            $toQuantiy = "SELECT * FROM producto WHERE id=" .$request->id ."";
            $producto = Db::select($toQuantiy);
            $idPCart = Cart::get($request->id);
            if(Cart::get($request->id)){
                foreach($producto as $row){
                    $sumQ = $idPCart->quantity + $request->quantity;
                    $rest = $row->cantidad - $idPCart->quantity;
                    if( $sumQ > $row->cantidad){
                        $request->session()->flash('message', 'Sólo puedes agregar '. $rest .' unidades más a tu carrito de '. $row->nombre .'');
                        return back();
                    }else{
                        
                        Cart::add(array(
                            'id' => $request->id?$request->id:'1', // inique row ID
                            'name' => $request->name?$request->name:'example',
                            'price' =>$request->price?$request->price:20.20,
                            'quantity' => $request->quantity?$request->quantity:1
                                // 'attributes' => array(
                                 //     'color' => $request->color?$request->color:'green',
                            //     //     'size' => $request->size?$request->size:'Big',
                            //     // )
                        ));
                        return back();
                    }
                }
            }else{
                Cart::add(array(
                    'id' => $request->id?$request->id:'1', // inique row ID
                    'name' => $request->name?$request->name:'example',
                    'price' =>$request->price?$request->price:20.20,
                    'quantity' => $request->quantity?$request->quantity:1
                        // 'attributes' => array(
                         //     'color' => $request->color?$request->color:'green',
                    //     //     'size' => $request->size?$request->size:'Big',
                    //     // )
                ));
                return back();
            }
            
        }else{
            Cart::add(array(
                'id' => $request->id?$request->id:'1', // inique row ID
                'name' => $request->name?$request->name:'example',
                'price' =>$request->price?$request->price:20.20,
                'quantity' => $request->quantity?$request->quantity:1
                    // 'attributes' => array(
                     //     'color' => $request->color?$request->color:'green',
                //     //     'size' => $request->size?$request->size:'Big',
                //     // )
            ));
            return back();
        }
        
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
    public function destroy($cart)
    {
        Cart::remove($cart);
        return back();
    }
}