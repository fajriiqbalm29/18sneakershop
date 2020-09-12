@extends('seller.layouts.app')

@section('title','Transaksi')

@section('content')


<div class="animated fadeIn">
    <div class="row">
    	<h4>Data Transaksi</h4>
    	<hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th>Invoice</th>
                                <th>Nama Penerima</th>
                                <th>tanggal</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trans as $data)
                            <tr>
                            	<td>{{$loop->iteration}}</td>
                                <td>{{$data->invoice}}</td>
                                <td>{{$data->nama_penerima}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->nama_produk}}</td>
                                <td>{{$data->qty}}</td>
                                <td>{{$data->total}}</td>
                                <td>
                                @if($data->status == 0)
                                    <p class="badge badge-warning">Menunggu</p>
                                @elseif($data->status == 1)
                                    <p class="badge badge-info">Diproses</p>
                                @elseif($data->status == 2 )
                                    <p class="badge badge-secondary">Dikirim</p>
                                @elseif($data->status == 3)
                                    <p class="badge badge-success">Selesai</p>
                                @else
                                    <p class="badge badge-danger">Batal</p>
                                @endif
                                </td>
                                <td>
                                	<a href="{{route('transaksi.edit',$data->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> ubah Status</a>
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

@push('addon-script')

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

@endpush

