<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\VentaInventario;
use Illuminate\Support\Facades\DB;
use Cart;

class SiteController extends Controller
{
    public function sendDataCart(){
        
        return $clients;
    }

    public function home(){
        $toProducts = "SELECT vi.idProducto as idProductoVenta, p.*, SUM(vi.cantidad) AS TotalVentas
        FROM venta_inventario as vi INNER JOIN producto as p ON p.id = vi.idProducto
        GROUP BY vi.idProducto
        ORDER BY SUM(vi.cantidad) DESC
        LIMIT 0 , 3";
        $products = Db::select($toProducts);
        
        return view('site.index', compact('products'));
    }
}
