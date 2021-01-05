@extends('layouts.appAd')
@section('content')

    <div class="container">
      <td><a href="/produks/add" class="btn mt-50" style="background-color:blue; color:white;">Tambah</a></td>
        <table>
          <thead>
            <td>Nama</td>
            <td>Harga</td>
            <td>Gambar</td>
          </thead>
          @foreach($produk as $produks)
          <tbody>
            <td>{{$produks->nama}}</td>
            <td>Rp.{{$produks->harga}}/kg</td>
            <td><img src="produk/{{$produks->gambar}}" height="100px" width="100px"></td>
            <td>
              <a href="{{ route('produk.edit',$produks->id)}}" class="btn mt-50" style="background-color:green; color:white;">Update</a>
            </td>
            <td>
              <a href="{{ route('produk.delete',$produks->id)}}" class="btn mt-50" style="background-color:red; color:white;">Delete</a>
            </td>
          </tbody>
          @endforeach
          <tfoot>
          </tfoot>
        </table>
    </div>

@endsection
