@extends('seller.layouts.app')

@section('title','Dashboard')

@section('content')

        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">Rp. <span class="count">{{$hasil}}</span></div>
                                            <div class="stat-heading">Penghasilan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$jual}}</span></div>
                                            <div class="stat-heading">Penjualan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Transaksi Terakhir </h4>
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
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($trans as $items)
                                                <tr>
                                                    <td class="serial">{{$loop->iteration}}</td>
                                                    <td> {{$items->invoice}} </td>
                                                    <td>  <span class="name"> {{$items->nama_penerima}} </span> </td>
                                                    <td> {{$items->created_at}} </td>
                                                    <td> <span class="product"> {{$items->nama_produk}} </span> </td>
                                                    <td><span class="count">{{$items->qty}}</span></td>
                                                    <td>Rp. {{$items->total}}</td>
                                                    <td>
                                                        @if($items->status == 0)
                                                            <p class="badge badge-warning">Menunggu</p>
                                                        @elseif($items->status == 1)
                                                            <p class="badge badge-info">Diproses</p>
                                                        @elseif($items->status == 2 )
                                                            <p class="badge badge-secondary">Dikirim</p>
                                                        @elseif($items->status == 3)
                                                            <p class="badge badge-success">Selesai</p>
                                                        @else
                                                            <p class="badge badge-danger">Batal</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>

@endsection