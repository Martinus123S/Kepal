@extends('layouts.appAd')

@section('content')
  <div >Tambah Produk </div>
  <div class="">
    @foreach($produk as $produks)
    <form class=""  method="post" action="/produks/update/{{$produks->id}}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="">
          <label for="nama">Nama</label>
          <input type="text" name="nama" value="{{$produks->nama}}">
        </div>
        <div class="">
          <label for="nama">Harga</label>
          Rp<input type="text" name="harga" value="{{$produks->harga}}">/kg
        </div>
        <div class="">
          <label for="nama">Gambar</label>
          <input type="file" name="gambar" value="{{$produks->gambar}}">
        </div>
        <div class="">
          <input type="submit" value="Simpan">
        </div>
    </form>
    @endforeach
  </div>
@endsection
