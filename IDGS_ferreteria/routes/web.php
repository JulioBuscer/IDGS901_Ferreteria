<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['auth']], function(){
    Route::get('/','SiteController@home')->name('home');
});

Route::get('/login','SiteController@login')->name('login');
Route::post('/login','SiteController@loginPost');
Route::get('/logout','SiteController@logout');

//*Route::get('/', 'SiteController@index');
//Route::get('/catalogo-productos', 'SiteController@catalogo_productos');
//Route::get('/login', 'UsersController@login');
//Route::get('/agregar-producto', 'ProductosController@agregar');