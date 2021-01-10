<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Produk;
use App\pesan;
use App\Pesan_Produk;
use Auth;

class PesanController extends Controller
{

  function index()
  {
    $id = Auth::user()->id;
    $data = Cart::where('id_user', $id)->get();
    return view('user.detailPesanan', compact('data'));
  }

  public function addPesan(Request $request)
  {
    $pesan = new Pesan();
    $pesan->body = $request->body;
    $pesan->save();
  }

  function view()
  {
    $id = Auth::user()->id;
    $pesans = pesan::where('id_user', '=', $id)->get();
    // dd($pesans);
    return view('user.data-pesanan', compact('pesans'));
  }

  function insert(Request $request)
  {
    $rsa = new RSA;
    $id_user = Auth::user()->id;
    $carts = Cart::where('id_user', $id_user)->get();
    $pesan = new Pesan;
    $pesan->id_user = $id_user;
    $pesan->alamat = $rsa->encrypt($request->alamat);
    $pesan->total = $request->total;
    $pesan->no_telepon = $rsa->encrypt($request->no_tel);
    $pesan->status = "pending";
    $pesan->save();
    $id = $pesan->id;

    foreach ($carts as $cart) {
      $pesan_produk = new Pesan_Produk;
      $pesan_produk->id_produk = $cart->id_produk;
      $pesan_produk->id_pesan = $id;
      $pesan_produk->kuantitas = $cart->kuantitas;
      $pesan_produk->total = $cart->total;
      $pesan_produk->save();
      $cart->delete(); // sesudah data dimasukan ke pesan_produk data cart akan dihapus
    }

    return redirect()->route('pesanan.view');
  }

  function detail($id_pesan)
  {
    $shows = Pesan_Produk::where('id_pesan', $id_pesan)->get();
    $produks = Produk::all();
    return view('user.detail-produk-pesanan', compact('shows', 'produks'));
  }
  public function updatePesan(Request $request, $id)
  {
    $pesan = Pesan::find($id);
    $this->validate(request(), ['body' => 'required']);

    $pesan->body = $request->get(body);
    $pesan->save();
  }
}
