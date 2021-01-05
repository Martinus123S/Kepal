@extends('layouts.app')
@section('content')
<div class="container pt-3 pb-5">
	<div class="row">
	  <h3>Pesan</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<?php  $total = 0 ?>
<div class="container">
  <div class="">
    <table class="table table-resposive-x1" style="border:2px solid #e6e6e6;">
      <tr>
        <td>Nama</td>
        <td>Kuantitas
        </td>
        <td>Harga</td>
        <td>Subtotal</td>
      </tr>
      @foreach($data as $datas)
      <?php $total += $datas->total  ?>
      <tr>
        <td>
          {{$datas->nama}}
        </td>
        <td>{{$datas->kuantitas}}
        </td>
        <td>{{$datas->harga}}</td>
        <td>{{$datas->total}}
        <input type="hidden" id="subtotal{{$datas->id}}" value="{{$datas->total}}"></td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="container">
    <form class="" action="{{route('pesanan.insert')}}" method="post">
      {{ csrf_field() }}
      <div class="">Total&emsp;&emsp;&emsp;&emsp;:
        <input type="text" name="total" id="total" value="{{$total}}" readonly>
      </div>
      <div class="">Alamat&emsp;&emsp;&emsp;:
        <input type="text" name="alamat" required>
      </div>
      <div class="">No Telepon&emsp;:
        <input type="text" name="no_tel" required>
      </div>
      <input type="submit" value="Pesan">
  </form>
  </div>
</div>

@endsection
