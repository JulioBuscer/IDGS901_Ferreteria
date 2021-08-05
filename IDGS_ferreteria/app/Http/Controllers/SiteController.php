<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\VentaInventario;
use Illuminate\Support\Facades\DB;
use Cart;

class SiteController extends Controller
{


    public function catalogo_productos()
    {
        return view('site.catalogo_productos');
    }

    public function home(){
        $toProducts = "SELECT vi.idProducto as idProductoVenta, p.*, SUM(vi.cantidad) AS TotalVentas
        FROM venta_inventario as vi INNER JOIN producto as p ON p.id = vi.idProducto
        GROUP BY vi.idProducto
        ORDER BY SUM(vi.cantidad) DESC
        LIMIT 0 , 3";
        $products = Db::select($toProducts);
        
        $toClient = "SELECT cliente.id, concat(p.nombre, ' ', p.apellidoP, ' ', p.apellidoM) as nombre, cliente.direccion, cliente.rfc  FROM persona p INNER JOIN cliente ON cliente.idPersona = p.id";
        $clients = Db::select($toClient);
        return view('site.index', compact('products','clients'));
    }
}
