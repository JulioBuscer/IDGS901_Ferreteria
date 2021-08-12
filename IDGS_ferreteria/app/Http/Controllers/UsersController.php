<?php

namespace App\Http\Controllers;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Cart;
use App\Notifications\RealTimeNotification;
class UsersController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function logout(){
        Auth::logout();
        Cart::clear();
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
                $user = Auth::user();
                $user->notify(new RealTimeNotification('Hello World'));
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