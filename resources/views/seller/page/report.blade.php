@extends('seller.layouts.app')

@section('title','Report')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <h4>Report Transaksi</h4>
        <hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" onchange="location = this.value" >
                                <optgroup label="Semua Laporan">
                                    <option value="{{route('lihatlaporan')}}" {{ Request::is('seller/report') ? 'selected' : '' }}>All</option>
                                </optgroup>
                                <optgroup label="Harian">
                                    <option value="{{route('laporanhari')}}" {{ Request::is('seller/report/harian') ? 'selected' : '' }}>Hari Ini</option>
                                </optgroup>
                                <optgroup label="Bulanan">
                                    <option value="{{route('laporanbulan','01')}}" {{ Request::is('seller/report/01') ? 'selected' : '' }}>Januari</option>
                                    <option value="{{route('laporanbulan','02')}}" {{ Request::is('seller/report/02') ? 'selected' : '' }}>Februari</option>
                                    <option value="{{route('laporanbulan','03')}}" {{ Request::is('seller/report/03') ? 'selected' : '' }}>Maret</option>
                                    <option value="{{route('laporanbulan','04')}}" {{ Request::is('seller/report/04') ? 'selected' : '' }}>April</option>
                                    <option value="{{route('laporanbulan','05')}}" {{ Request::is('seller/report/05') ? 'selected' : '' }}>Mei</option>
                                    <option value="{{route('laporanbulan','06')}}" {{ Request::is('seller/report/06') ? 'selected' : '' }}>Juni</option>
                                    <option value="{{route('laporanbulan','07')}}" {{ Request::is('seller/report/07') ? 'selected' : '' }}>Juli</option>
                                    <option value="{{route('laporanbulan','08')}}" {{ Request::is('seller/report/08') ? 'selected' : '' }}>Agustus</option>
                                    <option value="{{route('laporanbulan','09')}}" {{ Request::is('seller/report/09') ? 'selected' : '' }}>September</option>
                                    <option value="{{route('laporanbulan','10')}}" {{ Request::is('seller/report/10') ? 'selected' : '' }}>Oktober</option>
                                    <option value="{{route('laporanbulan','11')}}" {{ Request::is('seller/report/11') ? 'selected' : '' }}>November</option>
                                    <option value="{{route('laporanbulan','12')}}" {{ Request::is('seller/report/12') ? 'selected' : '' }}>Desember</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Invoice</th>
                                                    <th>Nama Penerima</th>
                                                    <th>Tanggal</th>
                                                    <th>Produk</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($trans as $data)
                                                <tr>
                                                    <td class="serial">{{$loop->iteration}}</td>
                                                    <td> {{$data->invoice}} </td>
                                                    <td> {{$data->nama_penerima}} </td>
                                                    <td>  <span class="name">{{$data->created_at}}</span> </td>
                                                    <td> <span class="product">{{$data->nama_produk}}</span> </td>
                                                    <td><span class="count">{{$data->qty}}</span></td>
                                                    <td>{{$data->total}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-center"><strong>TOTAL</strong></td>
                                                    @php
                                                    $total = number_format( $total , 0 , '.' , '.' )
                                                    @endphp
                                                    <td class="text-center"><strong>Rp. {{$total}}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
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
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush