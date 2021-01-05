@extends('layouts.app')
@section('content')
<div class="container pt-3 pb-5">
	<div class="row">
	  <h3>Keranjang</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<div class="container">
  <div class="row" style="background-color:white;">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <h6>Produk</h6>
    </div>
    <div class="col-sm" style="margin-left:50px;">
      <h6>Kuantitas</h6>
    </div>
    <div class="col-sm" style="margin-left:-20px;">
      <h6>Harga</h6>
    </div>
  </div>
  @foreach($data as $carts)
  <form class="" method="post" action="{{Route('cart.update',$carts->id)}}" enctype="multipart/form-data">
    <table class="table" style="width:85%;margin-bottom:-25px;" style="background-color:white;">
    <thead>
      <tr>
        <th colspan="2"></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
  <tbody style="background-color:white;">
      {{ csrf_field() }}
      <tr>
        <td rowspan ="3">
          <img src="produk/{{$carts->gambar}}" alt="" style="width:180px; height:150px;">
          <input type="hidden" name="gambar" value="{{$carts->gambar}}">
        </td>
        <td>{{$carts->nama}}
          <input type="hidden" name="nama" value="{{$carts->nama}}">
        </td>
        <td rowspan="3">
          <input type="number" name="kuantitas" min="1" value="{{$carts->kuantitas}}" >Kg
        </td>
        <td>Rp.{{$carts->total}}
          <input type="hidden" id="subtotal{{$carts->id}}" value="{{$carts->total}}">
        </td>
      </tr>
      <tr>
        <td colspan="3">Rp.{{$carts->harga}}/kg
          <input type="hidden" name="harga" value="{{$carts->harga}}">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Update" class="btn btn-info">
          <a class="btn btn-danger" href="{{Route('cart.delete',$carts->id)}}">hapus</a>
        </td>
				<td></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
  </table>
    </form>
  <!-- <script type="text/javascript">
  function total()
		{
			var bil1, bil2, jumlah;
			bil1=0;
			bil2=document.getElementById("subtotal{{$carts->id}}").value;

			jumlah=parseInt(bil1)+parseInt(bil2)
			document.getElementById("total").value=jumlah;
		}
  </script> -->
  @endforeach
  <div class="container">
    <!-- <div class="row">
      <div class="col-sm-8"></div>
      <div class="col-sm-2" style="margin-left:-80px;">
        <h6>Total Harga :</h6>
      </div>
      <div class="col-sm" style="margin-left:-80px;">
        <input class="ml-4" type="text" id="total" value="" style="width:150px;" onload="total()" readonly>
      </div>
    </div> -->
    <div class="container">
      <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm" style="margin-left:-45px;">
          <a href="{{route('pesanan.index')}}" class="btn btn-success mt-3 pl-3">Pesan</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
