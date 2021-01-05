@extends('layouts.admin')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="height:600px;" src="assets/img/IKAN-KUE.jpg" alt="img1">
       <div class="carousel-caption d-none d-md-block">
         <h1>POIL's</h1>
          <h5>Penjualan Online Ikan Laut Sibolga</h5>
         <a href="#" class="btn btn-success btn-lg ">Shop Now</a>
       </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:600px;" src="assets/img/bandeg.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1>POIL's</h1>
         <h5>Penjualan Online Ikan Laut Sibolga</h5>
         <button class="btn btn-success btn-lg">Shop Now</button>
       </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container pt-5">

	<div class="row">
	  <h3>Belanja Sekarang</h3>
	</div>
		<div class="row">
		<div class="underline"></div>
	</div>
</div>
<div class="container mt-5">
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
<footer>
	<div class="container-fluid pt-5 pb-5 bg-dark text-light">
  </div>
</footer>
@endsection
