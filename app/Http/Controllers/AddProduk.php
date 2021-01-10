<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class AddProduk extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  function create()
  {
    return view('admin.addProduk');
  }

  function index(Produk $produk)
  {
    $produk = produk::all();
    return view('admin.produk', compact('produk'));
  }


  function insert(Request $request)
  {
    $data = "n";
    if ($request->hasFile('gambar')) {
      $destination = "produk";
      $gambar = $request->file('gambar');
      $gambar->move($destination, $gambar->getClientOriginalName());
      $data = "y";
    }

    if ($data == "y") {
      $data = new produk;
      $data->nama = $request->nama;
      $data->harga = $request->harga;
      $data->gambar = $gambar->getClientOriginalName();
      $data->save();
    }

    return redirect('/produks');
  }

  function edit($id)
  {
    $produk = Produk::where('id', $id)->get();

    return view('admin.edit', compact('produk'));
  }

  function update(Request $request, $id)
  {
    $produks = produk::where('id', $id)->first();
    $data = "n";
    if ($request->hasFile('gambar')) {
      $destination = "produk";
      $gambar = $request->file('gambar');
      $gambar->move($destination, $gambar->getClientOriginalName());
      $data = "y";
    } else {
      $produks->nama = $request->nama;
      $produks->harga = $request->harga;
      $produks->save();
    }
    if ($data == "y") {
      $produks->nama = $request->nama;
      $produks->harga = $request->harga;
      $produks->gambar = $gambar->getClientOriginalName();
      $produks->save();
    }

    return redirect()->route('produk.index');
  }

  function delete($id)
  {
    $produk = produk::where('id', $id)->first();
    $produk->delete();

    return redirect()->route('produk.index');
  }
}
