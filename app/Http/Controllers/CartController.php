<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Produk;
use App\User;
use Auth;

class CartController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  function index()
  {
    $id = Auth::user()->id;
    $data = Cart::where('id_user', $id)->get();
    return view('user.cart', compact('data'));
  }

  //id untuk produk
  function insert($id)
  {
    $cart = new Cart;
    $produk = Produk::where('id', $id)->first();
    $id_user = Auth::user()->id;
    $cart->id_user = $id_user;
    $cart->id_produk = $id;
    $cart->kuantitas = 1;
    $cart->nama = $produk->nama;
    $cart->harga = $produk->harga;
    $cart->gambar = $produk->gambar;
    $cart->total = $cart->harga * $cart->kuantitas;
    $cart->save();

    return redirect()->back()->with('success', 'Product added to cart successfully!');
  }

  function delete($id)
  {
    $cart = cart::where('id', $id)->first();
    $cart->delete();

    return redirect()->route('cart.index');
  }

  function update(Request $request, $id)
  {
    $cart = cart::where('id', $id)->first();
    $produk = Produk::where('id', $cart->id_produk)->first();
    $id_user = Auth::user()->id;
    $cart->id_user = $id_user;
    $cart->kuantitas = $request->kuantitas;
    $cart->nama = $produk->nama;
    $cart->harga = $produk->harga;
    $cart->gambar = $produk->gambar;
    $cart->total = $cart->harga * $cart->kuantitas;
    $cart->save();


    return redirect()->route('cart.index');
  }
}
