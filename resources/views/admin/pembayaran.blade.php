@extends('layouts.appAd')

@section('content')
<?php
function decsRSA($E)
{
  $data[0] = 1;
  for ($i = 0; $i <= 11; $i++) {
      $rest[$i] = pow($E, 1) % 119;
      if ($data[$i] > 119) {
          $data[$i + 1] = $data[$i] * $rest[$i] % 119;
      } else {
          $data[$i + 1] = $data[$i] * $rest[$i];
      }
  }
  $get = $data[11] % 119;
  return $get;
}
function decryptRSA($enc, $dec = "")
{
  for ($i = 0; $i < strlen($enc); $i++) {
      $m = ord($enc[$i]);
      if ($m <= 119) {
          $dec = $dec . chr(decsRSA($m));
      } else {
          $dec = $dec . $enc[$i];
      }
  }
  return $dec;
}
?>
<div class="container-fluid">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('gagal'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('gagal') !!}</li>
    </ul>
</div>
@endif
    <h2>List Pembayaran</h2>
  <table class="table table-striped">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">No Telepon</th>
        <th scope="col">Bukti</th>
        <th scope="col">Total Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Option</th>
      </tr>
      @foreach($pesan as $p)
      <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$p->name}}</td>
        <td>{{decryptRSA($p->alamat)}}</td>
        <td>{{decryptRSA($p->no_telepon)}}</td>
        <td><img src="/bukti/{{$p->gambar}}"  style="width:180px; height:100px;"></td>
        <td>{{$p->total}}</td>
        <td>{{$p->status}}</td>
        @if($p->status == "processed")
        <td><a href="{{Route('konfirmasi',$p->id)}}" class="btn btn-success">Proses</a></td>
        @else
        <td><div class="btn btn-success" style="cursor: none;">Sudah Berhasil</div></td>
        @endif
      </tr>
      @endforeach

  </table>
  
  {{$pesan->links()}}
</div>
@endsection
