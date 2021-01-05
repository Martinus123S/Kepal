<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class startController extends Controller
{
  // untuk menampilkan isiproduk di menu home max nya 4.
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
