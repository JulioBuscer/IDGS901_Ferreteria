<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;

use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;
class CatalogoProductos extends Controller
{

    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(Auth::user()){
            if(Auth::user()->id_rol == 2){
                $sql = 'SELECT p.id,p.nombre,p.descripcion,p.precio,p.cantidad,p.unidad,p.fotografia, c.descripcion as descripcionCat, c.id as idCat FROM  producto AS p INNER JOIN categoria AS c ON (p.idCategoria = c.id) WHERE active = 1';
                $table = Db::select($sql);
                $select = CategoriaModel::all();
                $toClient = "SELECT cliente.id, concat(p.nombre, ' ', p.apellidoP, ' ', p.apellidoM) as nombre, cliente.direccion, cliente.rfc  FROM persona p INNER JOIN cliente ON cliente.idPersona = p.id";
                $clients = Db::select($toClient);
                return view('catalagoProducto.vista', compact('table','select','clients'));
            }else{
                return view('site.not_permission');
            }
            
        }else{
            $sql = 'SELECT p.id,p.nombre,p.descripcion,p.precio,p.cantidad,p.unidad,p.fotografia, c.descripcion as descripcionCat, c.id as idCat FROM  producto AS p INNER JOIN categoria AS c ON (p.idCategoria = c.id) WHERE active = 1';
                $table = Db::select($sql);
                $select = CategoriaModel::all();
                $toClient = "SELECT cliente.id, concat(p.nombre, ' ', p.apellidoP, ' ', p.apellidoM) as nombre, cliente.direccion, cliente.rfc  FROM persona p INNER JOIN cliente ON cliente.idPersona = p.id";
                $clients = Db::select($toClient);
            return view('catalagoProducto.vista', compact('table','select','clients'));
        }
        
        
    }

}