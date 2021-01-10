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
  <?php
    $i = 0;
  ?>
  @foreach($data as $carts)
  <?php
    $i++;
  ?>
  <form class="" method="post" action="{{Route('cart.update',$carts->id)}}" enctype="multipart/form-data">
    <table class="table"  style="background-color:white;">
      @if($i == 1)
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Produk</th>
        <th>Kuantitas</th>
        <th>Total Harga</th>
        <th>Harga</th>
        <th rowspan="2">Option</th>
      </tr>
    </thead>
    @endif
  <tbody>
      {{ csrf_field() }}
      <tr>
        <td rowspan ="3">
          <img src="produk/{{$carts->gambar}}" alt="" style="width:180px; height:150px;">
          <input type="hidden" name="gambar" value="{{$carts->gambar}}">
        </td>
        <td>{{$carts->nama}}
          <input type="hidden" name="nama" value="{{$carts->nama}}">
        </td>
        <td>
          <input type="number" id="cart-{{$carts->id}}" name="kuantitas" onchange="myFunction({{$carts->id}})" min="1" value="{{$carts->kuantitas}}" >Kg
        </td>
        <td>Rp.{{$carts->total}}
          <input type="hidden" id="subtotal{{$carts->id}}" value="{{$carts->total}}">
        </td>
        
        <td>Rp.{{$carts->harga}}/kg
          <input type="hidden" name="harga" value="{{$carts->harga}}">
        </td>
        <td>
          <input type="submit" value="Update" class="btn btn-info">
          <a class="btn btn-danger" href="{{Route('cart.delete',$carts->id)}}">hapus</a>
        </td>
      </tr>
    </tbody>
  </table>
    </form>
  <script type="text/javascript">
  function myFunction($cart)
		{
			// var bil1, bil2, jumlah;
			// bil1=0;
			// bil2=document.getElementById("subtotal{{$carts->id}}").value;

			// jumlah=parseInt(bil1)+parseInt(bil2)
			// document.getElementById("total").value=jumlah;
		}
  </script>
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
    @if($i > 0)
    <div class="container">
      <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm" style="margin-left:-45px;">
          <a href="{{route('pesanan.index')}}" class="btn btn-success mt-3 pl-3">Pesan</a>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
