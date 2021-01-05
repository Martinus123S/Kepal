@extends('layouts.app')
@section('content')
<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>

<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header"><h2>Pembayaran</h2></div>
      <div class="card-body">
        <form class="" action="{{route('pembayaran.bayar')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <table>
            <tr>
              <td>Silahkan kirim ke : 531901014819534 (BRI) </td>
            </tr>
            <tr>
              <td>Bukti Pembayaran</td>
            </tr>
            <tr>
              <input type="hidden" name="pesan" value="{{$id_pesan}}">
              <td><img id="uploadPreview" style="width: 150px; height: 150px;"></td>
            </tr>
            <tr>
              <td><input type="file" id="uploadImage" name="gambar" onchange="PreviewImage();" required></td>
            </tr>
            <tr>
              <td>
                <input type="submit" value="Bayar"  class="btn btn-success">
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
