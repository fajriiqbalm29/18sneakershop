@extends('user.layouts.app')

@section('title','Checkout')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{route('bayar')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Nama</p>
                                    <input type="text" class="form-control" name="namakirim">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Alamat</p>
                            <textarea class="form-control" name="alamatkirim"></textarea>
                        </div>
                        <hr>
                        <h4>Payment</h4>
                        <div class="checkout__input">
                            <h5>Transfer Ke Rekening Bank BCA 008889999 atas nama Dekasuki Oriental Food</h5>
                        </div>
                        <input type="hidden" name="produk" value="{{$produk->id}}">
                        <input type="hidden" name="qty" value="{{$qty}}">
                        <input type="hidden" name="total" value="{{$total}}">
                        <div class="checkout__input">
                            <div class="form-group">
				            <label>Upload Bukti Transfer:</label>
				            <div class="input-group">
				              <div class="custom-file">
				                <input type="file" class="custom-file-input" id="inputGroupFile04" name="bukti" required>
				                <label class="custom-file-label" for="inputGroupFile04">Pilih file</label>
				              </div>
				            </div>
				            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @php
                                    $harga = $produk->harga; 
                                    $harga = number_format( $harga , 0 , '.' , '.' )
                                @endphp
                                <li>{{$produk->nama_produk}} <span>Rp. {{$harga}}</span></li>
                                <li>Quantity <span>{{$qty}}</span></li>
                                <li>Ongkos Kirim <span>Rp. 10.000</span></li>
                            </ul>
                                @php
                                    $total = number_format( $total , 0 , '.' , '.' )
                                @endphp
                            <div class="checkout__order__total">Total <span>Rp. {{$total}}</span></div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('addon-script')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush