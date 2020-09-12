<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    public function penghasilan()
    {
    	$hasil = Transaction::where('status', 3)
    						->sum('total');
    	$jual = Transaction::where('status', 3)
    						->sum('qty');

    	$trans = Transaction::join('products','transactions.produk_id','products.id')
    						->select('transactions.*','products.nama_produk')
    						->OrderBy('Created_at','desc')->take(5)
    						->get();

    	return view('seller.page.dashboard',compact('hasil','jual','trans'));
    }

}
