@extends('layouts.appAd')

@section('content')
  <div >Tambah Produk </div>
  <div class="">
    <form class=""  method="post" action="/produks/add" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="">
          <label for="nama">Nama</label>
          <input type="text" name="nama">
        </div>
        <div class="">
          <label for="nama">Harga</label>
          Rp<input type="text" name="harga">/kg
        </div>
        <div class="">
          <label for="nama">Gambar</label>
          <input type="file" name="gambar">
        </div>
        <div class="">
          <input type="submit" value="Simpan">
        </div>
    </form>
  </div>
@endsection
