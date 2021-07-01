<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function catalogo_productos()
    {
        return view('site.catalogo_productos');
    }
}
