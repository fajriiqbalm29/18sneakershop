@extends('user.layouts.app')

@section('title','Product Details')

@section('content')

<section class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{asset('/')}}{{$produk->foto}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form action="{{route('checkout',$produk->slug)}}" method="get">
                    @csrf
                <div class="product__details__text">
                    <h3>{{$produk->nama_produk}}</h3>
                        @php
                            $harga = $produk->harga; 
                            $harga = number_format( $harga , 0 , '.' , '.' )
                        @endphp
                    <div class="product__details__price">Rp. {{$harga}}</div>
                    <p>{{$produk->deskripsi}}}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1" name="quantity">
                            </div>
                        </div>
                    </div>
                    @if(Auth::check())
                    <button class="primary-btn">BUY NOW</button>
                    @else
                    <a href="#" class="primary-btn" data-toggle="modal" data-target="#login">BUY NOW</a>
                    @endif
                    </form>
                    <ul>
                        <li><b>Availability</b> <span>{{$produk->stok}}</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection