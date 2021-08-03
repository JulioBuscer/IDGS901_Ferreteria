<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Models\VentaInventario;
use Illuminate\Support\Facades\DB;


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
        LIMIT 0 , 2";
        $products = Db::select($toProducts);

        return view('site.index', compact('products'));
    }

    public function login(){
        return view('users.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
        
    public function loginPost(Request $request){
        
        // Ejecutar validaciones de la petición
        $validateData = $request->validate([
            'password' => 'required|min:5|max:10',
            'email' => 'required|email'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // echo var_dump(Auth::user());
            if(Auth::user()->active=='1'){
                return Redirect::to('/');
            }else{
                echo ('Ya no estás en el sistema');
            } 
        } else {
            return Redirect()->route('login')->withErrors(
                ["password"=>"Las credenciales no coinciden"]);
        }
    }

}
