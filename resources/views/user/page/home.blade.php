@extends('user.layouts.app')

@section('title','HOME')

@section('content')

<div class="container">
	<div class="hero__item set-bg" data-setbg="{{asset('user/img/banner/banner.jpg')}}">
        <div class="hero__text">
            <span>NEW DESIGN</span>
            <h2>SNEAKERS <br />100% Original</h2>
            <p>Free Pickup and Delivery Available</p>
            <a href="{{route('index')}}" class="primary-btn">SHOP NOW</a>
        </div>
    </div>
</div>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach($cat as $kategori)
                        <li data-filter=".{{$kategori->nama_category}}">{{$kategori->nama_category}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($data as $produk)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$produk->nama_category}} ">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('/')}}{{$produk->foto}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{route('detail',$produk->slug)}}"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('detail',$produk->slug)}}">{{$produk->nama_produk}}</a></h6>
                        @php
                            $harga = $produk->harga; 
                            $harga = number_format( $harga , 0 , '.' , '.' )
                        @endphp
                        <h5>Rp. {{$harga}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection