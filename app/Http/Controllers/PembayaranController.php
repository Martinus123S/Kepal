<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\pesan;

class PembayaranController extends Controller
{
  function index($id)
  {
    $id_pesan = $id;
    return view('user.pembayaran', compact('id_pesan'));
  }

  function bayar(Request $request)
  {
    $data = "n";
    if ($request->hasFile('gambar')) {
      $destination = "bukti";
      $gambar = $request->file('gambar');
      $gambar->move($destination, $gambar->getClientOriginalName());
      $data = "y";
    }

    $pesan_id = $request->pesan;
    if ($data == "y") {
      $pembayaran = new Pembayaran;
      $pembayaran->id_pesan = $pesan_id;
      $pembayaran->gambar = $gambar->getClientOriginalName();
      $pembayaran->save();
    }
    $pesan = pesan::where('id', $pesan_id)->first();
    $pesan->status = "processed";
    $pesan->save();

    return redirect()->route('pesanan.view');
  }

  function user()
  {
    $pesan = Pesan::join('users', 'users.id', '=', 'pesans.id_user')
      ->join('pembayaran', 'pembayaran.id_pesan', '=', 'pesans.id')
      ->paginate(5, array('users.name', 'users.email', 'pesans.*', 'pembayaran.gambar'));
    return view('admin.pembayaran', compact('pesan'));
  }
  function updatePembayaran($id)
  {
    $pesan = Pesan::find($id);
    // dd($pesan);
    $pesan->status = "Berhasil";
    $pesan->save();
    return redirect()->back()->with('success', 'Berhasil di proses');
  }
  function batalkanPembayaran($id)
  {

    $pesan = Pesan::find($id);
    // dd($pesan);
    $pesan->status = "Dibatalkan";
    $pesan->save();
    return redirect()->back()->with('gagal', 'Pesanan Tidak sah');
  }
}
