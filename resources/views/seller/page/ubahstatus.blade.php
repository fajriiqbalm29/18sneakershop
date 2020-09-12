@extends('seller.layouts.app')

@section('title','Ubah Status')

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
    	<h4>Ubah Produk</h4>
    	<hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   
                </div>
                <div class="card-body">
                   <label>Invoice</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->invoice}}" disabled>
                  </div>
                   <label>Nama Penerima</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->nama_penerima}}" disabled>
                  </div>
                   <label>Tanggal</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->created_at}}" disabled>
                  </div>
                   <label>Produk</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->nama_produk}}" disabled>
                  </div>
                   <label>Qty</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->qty}}" disabled>
                  </div>
                   <label>Total</label>
                  <div class="form-group">
                    <input type="text" class="form-control text-primary" value="{{$data->total}}" disabled>
                  </div>
                  <label>Bukti Bayar</label>
                  <div class="form-group">
                    <img style="max-width: 200px;" src="{{asset('/')}}{{$data->bukti_bayar}}">
                  </div>
                  <form action="{{route('transaksi.update',$data->id)}}" method="post">
                    @csrf
                    @method('put')
                    <label>Status</label>
                    <div class="form-group">
                      <select class="form-control" name="status">
                        <option value="0">Menunggu</option>
                        <option value="1" @if($data->status == 1 ) selected @endif>Diproses</option>
                        <option value="2" @if($data->status == 2 ) selected @endif>Dikirim</option>
                        <option value="3" @if($data->status == 3 ) selected @endif>Selesai</option>
                        <option value="4" @if($data->status == 4 ) selected @endif>Batal</option>
                      </select>
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