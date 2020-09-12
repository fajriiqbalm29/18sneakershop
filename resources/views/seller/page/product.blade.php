@extends('seller.layouts.app')

@section('title','Kelola Produk')

@section('content')

<div class="animated fadeIn">
    <div class="row">
    	<h4>Kelola Produk</h4>
    	<hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah barang</a></strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $product as $items)
                            <tr>
                            	<td>{{$loop->iteration}}</td>
                              <td>{{$items->nama_category}}</td>
                                <td>{{$items->nama_produk}}</td>
                                <td>{{$items->deskripsi}}</td>
                                <td>{{$items->harga}}</td>
                                <td>{{$items->stok}}</td>
                                <td><img style="max-width: 120px;" src="{{asset('/')}}{{$items->foto}}"></td>
                                <td>
                                	<a href="{{route('product.edit',$items->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>

                                  <form action="{{route('product.destroy',$items->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                	<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></button>
                                  </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

<!-- Modal Tambah-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <label>Kategori</label>
        <div class="form-group">
          <select class="form-control" name="catid">
            <option selected> Pilih Kategori </option>
            @foreach($category as $cat)
            <option value="{{$cat->id}}">{{$cat->nama_category}}</option>
            @endforeach
          </select>
        </div>
        <label>Nama Produk</label>
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="nama Produk" name="namaproduk">
        </div>
        <label>Deskripsi</label>
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="Deskripsi Produk" name="deskproduk">
        </div>
        <label>Harga Produk</label>
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="Rp. ......." name="hargaproduk">
        </div>
        <label>Stok</label>
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="Jumlah Stok" name="stok">
        </div>
        <div class="form-group">
          <label>Upload Gambar</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile04" name="fotproduk" required>
              <label class="custom-file-label" for="inputGroupFile04">Pilih file</label>
            </div>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>


@push('addon-script')

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush