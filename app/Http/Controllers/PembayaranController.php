<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\pesan;

class PembayaranController extends Controller
{
      function index($id){
        $id_pesan = $id;
        return view('user.pembayaran',compact('id_pesan'));
      }

      function bayar(Request $request){
        $data = "n";
        if($request->hasFile('gambar')){
          $destination = "bukti";
          $gambar = $request->file('gambar');
          $gambar->move($destination, $gambar->getClientOriginalName());
          $data = "y";
        }

        $pesan_id = $request->pesan;
        if($data == "y"){
          $pembayaran = new Pembayaran;
          $pembayaran->id_pesan = $pesan_id;
          $pembayaran->gambar = $gambar->getClientOriginalName();
          $pembayaran->save();
        }
        $pesan = pesan :: where('id',$pesan_id)->first();
        $pesan->status = "processed";
        $pesan->save();

        return redirect()->route('pesanan.view');
      }

}
