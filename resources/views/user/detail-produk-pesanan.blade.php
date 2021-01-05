@extends('layouts.app')
@section('content')
<div class="container pt-3 pb-5">
	<div class="row">
	  <h3>Data Pesanan Produk</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<div class="container">
	<div class="row" style="background-color:white;">
    <div class="col-sm-">
    </div>
    <div class="col-sm-5">
      <h6 class="container">Produk</h6>
    </div>
    <div class="col-sm-2" style="margin-left:50px;">
      <h6>Kuantitas</h6>
    </div>
    <div class="col-sm" style="margin-left:-20px;">
      <h6>Harga</h6>
    </div>
  </div>
	  @foreach($shows as $show)
		<table class="table tabel-resposive-x1" style="width:76%;border-bottom:2px solid #e6e6e6;">
		  <tr>
		    @foreach($produks as $produk)
		      @if($produk->id === $show->id_produk)
					<td rowspan="2">
						<img src="/produk/{{$produk->gambar}}"  style="width:180px; height:100px;">
					</td>
						<td>{{$produk->nama}}</td>
		        <td style="width:150px;">{{$show->kuantitas}} Kg</td>
		        <td>Rp.{{$show->total}}</td>
		      @endif
				</tr>
		    @endforeach
			<tr rowspan="2">
						<td>{{$produk->harga}}</td>
						<td></td>
						<td></td>
			</tr>

		</table>
		  @endforeach
			<div class="container">
	      <div class="row">
	        <div class="col-sm-8"></div>
	        <div class="col-sm" style="margin-left:-45px;">
	          <a href="{{route('pesanan.view')}}" class="btn btn-success mt-3 pl-3 col-sm-4">back</a>
	        </div>
	      </div>
	    </div>
</div>
@endsection
