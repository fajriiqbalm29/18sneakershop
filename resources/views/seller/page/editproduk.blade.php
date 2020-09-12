@extends('seller.layouts.app')

@section('title','Kelola Produk')

@section('content')


@push('addon-style')
<style>
  .file {
  visibility: hidden;
  position: absolute;
}
</style>

<div class="animated fadeIn">
    <div class="row">
    	<h4>Edit Produk</h4>
    	<hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   
                </div>
                <form action="{{route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">
                   <label>Kategori</label>
                  <div class="form-group">
                    <select class="form-control" name="catid">
                      <option> Pilih Kategori </option>
                      @foreach($kategori as $kat)
                      <option value="{{$kat->id}}" @if($data->category_id == $kat->id) selected @endif>{{$kat->nama_category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <label>Nama Produk</label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="nama Produk" name="namaproduk" value="{{$data->nama_produk}}">
                  </div>
                  <label>Deskripsi</label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Deskripsi Produk" name="deskproduk" value="{{$data->deskripsi}}">
                  </div>
                  <label>Harga Produk</label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Rp. ......." name="hargaproduk" value="{{$data->harga}}">
                  </div>
                  <label>Stok</label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Jumlah Stok" name="stok" value="{{$data->stok}}">
                  </div>
                  <div class="form-group">
                  <img style="max-width: 80px;" src="{{asset('/')}}{{$data->foto}}" id="preview" class="img-thumbnail">
                  </div>
                <div class="form-group">
                  <div id="msg"></div>
                    <input type="file" name="fotproduk" class="file" accept="image/*">
                    <div class="input-group my-3">
                      <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                      <div class="input-group-append">
                        <button type="button" class="browse btn btn-secondary">Browse...</button>
                      </div>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-secondary float-right"> Simpan</button>
                </div>
                </form>
            </div>
        </div>


    </div>
</div>

@endsection

@push('addon-script')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
  $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>
@endpush