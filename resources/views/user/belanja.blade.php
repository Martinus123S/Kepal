@extends('layouts.app')
@section('content')

<div class="container pt-3">

	<div class="row">
	  <h3>Produk</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<div class="container mt-5 mb-5">
	<div class="row">
    @foreach($produk as $produks)
		<div class="col-md-3">
			<div class="card">
				<img src="produk/{{$produks->gambar}}" style="height:200px;" alt="card-1" class="card-img-top">
				<div class="card-body">
					<h5>{{$produks->nama}}</h5>
					<h6>Rp.{{$produks->harga}}</h6>
          @guest
          <a href="{{Route('login')}}" class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
          @else
          <a href="{{Route('produk.inToCart',$produks->id)}}" class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
          @endguest
				</div>
			</div>
		</div>
    @endforeach
	</div>
</div>

@endsection
