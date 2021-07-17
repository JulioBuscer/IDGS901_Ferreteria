<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class SiteController extends Controller
{

    public function catalogo_productos()
    {
        return view('site.catalogo_productos');
    }

    public function home(){
        return view('site.index');
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
            return Redirect::to('/');
        } else {
            return Redirect()->route('login')->withErrors(
                ["password"=>"Las credenciales no coinciden"]);
        }
    }

}
