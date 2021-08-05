<?php

use App\Models\Proveedores;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::group(['middleware' => ['auth']], function () {
    // Agregamos los recursos de proveedores
    Route::resource('proveedores', 'ProveedoresController');
    
    // Agregamos los recursos de compras
    Route::resource('compras', 'ComprasController');
    Route::resource('/Productos', 'ProductosController');
    Route::resource('/Categorias', 'CategoriaController');
    
    Route::resource('cart', 'CartController');
    
    Route::resource('/Venta', 'SalesController');
});

Route::resource('/Catalogo', 'CatalogoProductos');
Route::get('/', 'SiteController@home')->name('home');
Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@loginPost');
Route::get('/logout', 'UsersController@logout');


/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
*/