<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function agregar(){
        return view('productos.agregar');
    }
}
