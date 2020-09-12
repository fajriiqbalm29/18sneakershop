<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function lihatlaporan()
    {
    	$trans = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status', 3)
    						->select('transactions.*', 'products.nama_produk')
    						->get();
    	$total = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status',3)
    						->sum('total');


    	return view('seller.page.report',compact('trans','total'));
    }

    public function laporanfilter()
    {
    	$trans = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status',3)
    						->where('transactions.created_at',Carbon::today())
    						->select('transactions.*','products.nama_produk')
    						->get();
    	$total = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status',3)
    						->where('transactions.created_at',Carbon::today())
    						->sum('total');

    	return view('seller.page.report',compact('trans','total'));
    }

    public function laporanbulan($bulan)
    {
    	$trans = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status', 3)
    						->whereMonth('transactions.created_at',$bulan)
    						->select('transactions.*','products.nama_produk')
    						->get();
    	$total = Transaction::join('products','transactions.produk_id','products.id')
    						->where('status', 3)
    						->whereMonth('transactions.created_at',$bulan)
    						->sum('total');

    	return view('seller.page.report',compact('trans','total'));
    }
}
