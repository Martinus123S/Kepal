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
      @foreach($pesans as $pesan)
    <table class="col-sm mt-3">
      <tr>
        <td>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
              {{$pesan->alamat}}
            </div>
            <div class="col-sm-2" style="margin-left:50px;">
              {{$pesan->no_telepon}}
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
            @if($pesan->status != "processed")
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
