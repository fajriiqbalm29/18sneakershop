@extends('user.layouts.app')

@section('title','List Transaksi')

@section('content')

@push('addon-style')
<style>
    .hero{
        display: none;
    }
</style>
@endpush

<section class="shoping-cart">
    <div class="container">
	<h4><strong>List Transaksi</strong></h4>
	<hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                            	<th>No Invoice</th>
                                <th>Products</th>
                                <th>date</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $items)
                            <tr>
                            	<td>{{$items->invoice}}</td>
                                <td>
                                    <img style="max-width: 80px;" src="{{asset('/')}}{{$items->foto}}" alt="">
                                    <h5>{{$items->nama_produk}}</h5>
                                </td>
                                <td>{{$items->created_at}}</td>
                                <td>
                                    {{$items->harga}}
                                </td>
                                <td>
                                    {{$items->qty}}
                                </td>
                                <td>
                                    {{$items->total}}
                                </td>
                                <td class="shoping__cart__item__close">
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
                </div>
            </div>
        </div>
    </div>
</section>

@endsection