<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    function index(Produk $produk)
    {
        $produk = produk::all();
        return view('user.home', compact('produk'));
    }
}
