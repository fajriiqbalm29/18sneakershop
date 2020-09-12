<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use Auth;
class CheckoutController extends Controller
{
    public function checkout(Request $request,$slug){
    	$produk = Product::where('slug',$slug)->first();
    	$qty = $request->quantity;

    	$ongkir = 10000;
    	$total = $produk->harga * $qty + $ongkir;
    	return view('user.page.checkout',compact('produk','qty','total','ongkir'));
    }

    public function bayar(Request $request){
    	$data = new Transaction;

    	$data->invoice = 'INV'.time();
    	$data->user_id = Auth::id();
    	$data->produk_id = $request->produk;
    	$data->qty = $request->qty;
    	$data->total = $request->total;
    	$data->nama_penerima = $request->namakirim;
    	$data->alamat_penerima = $request->alamatkirim;

    	 $filename = time().$request->bukti->getClientOriginalName();

        $request->bukti->move(public_path('buktibayar/'),$filename);

        $data->bukti_bayar = 'buktibayar/'.$filename;

        $data->save();

        return view('user.page.sukses');

    }
}
