@extends('seller.layouts.app')

@section('title','Kelola Kategori')

@section('content')

<div class="animated fadeIn">
    <div class="row">
    	<h4>Kelola Kategori</h4>
    	<hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><a href="" class="btn btn-sm btn-primary text-light" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Kategori</a></strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($kategori as $items)
                            <tr>
                            	<td>{{$loop->iteration}}</td>
                                <td>{{$items->nama_category}}</td>
                                <td>
                                  <form action="{{route('category.destroy',$items->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                	<button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-trash"></i> Hapus</button>
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
        <h5 class="modal-title" id="tambahLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <label>Nama Kategori</label>
        <div class="form-group">
        	<input type="text" class="form-control" placeholder="nama Kategori" name="catname">
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

@endpush