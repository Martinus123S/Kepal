@extends('layouts.app')
@section('content')
<div class="container pt-3 pb-5">

	<div class="row">
	  <h3>Data-Pesanan</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm">
        <h6>Alamat</h6>
      </div>
      <div class="col-sm" style="margin-left:50px;">
        <h6>No Telepon</h6>
      </div>
      <div class="col-sm" style="margin-left:-20px;">
        <h6>Total</h6>
      </div>
      <div class="col-sm" style="margin-left:-20px;">
        <h6>Status</h6>
      </div>
      <div class="col-sm-1" >
      </div>
      <div class="col-sm" >
      </div>
    </div>
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
      @foreach($pesans as $pesan)
    
    <table class="col-sm mt-3">
      <tr>
        <td>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
              {{decryptRSA($pesan->alamat)}}
            </div>
            <div class="col-sm-2" style="margin-left:50px;">
              {{decryptRSA($pesan->no_telepon)}}
            </div>
            <div class="col-sm-2"style="margin-left:-20px;">
              Rp. {{$pesan->total}}
            </div>
            <div class="col-sm-2 pl-2" style="margin-left:-20px;">
              {{$pesan->status}}
            </div>
            <div class="col-sm-1">
              <a href="{{Route('pesanan.detail',$pesan->id)}}" class="btn btn-info">Detail</a>
            </div>
            @if($pesan->status != "processed" && $pesan->status !="Berhasil")
						<div class="col-sm" >
              <a href="{{Route('pembayaran.index',$pesan->id)}}" class="btn btn-success">Bayar</a>
            </div>
						@else
						<div class="cols-sm-1">
							<a href="{{Route('pembayaran.index',$pesan->id)}}" class="hidden"></a>
						</div>
						@endif
          </div>
        </td>
      </tr>
    </table>
    @endforeach
  </div>
@endsection
