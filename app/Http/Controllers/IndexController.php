<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class IndexController extends Controller
{
    //
    function userIndex(Produk $produk)
    {
        $produk = produk::all()->take(4);
        return view('welcome', compact('produk'));
    }

    function userBelanja(Produk $produk)
    {
        $produk = produk::all();
        return view('user.belanja', compact('produk'));
    }
}
