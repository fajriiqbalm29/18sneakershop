@extends('user.layouts.app')

@section('title','Product')

@section('content')

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Category</h4>
                        <ul>
                            @foreach($kategori as $items)
                            <li><a href="{{route('bycat',$items->id)}}">{{$items->nama_category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    @foreach($produk as $data)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('/')}}{{$data->foto}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{route('detail',$data->slug)}}"><i class="fa fa-eye"></i></a></li>
                           			{{-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$data->nama_produk}}</a></h6>
                                <h5>Rp. {{$data->harga}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center product__pagination">
                   {{$produk->links()}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection