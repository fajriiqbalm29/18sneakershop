<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;

class HistoryController extends Controller
{
    public function history(){
    	$data = Transaction::join('products','Transactions.produk_id','products.id')
    						->select('Transactions.*','products.nama_produk','products.foto','products.harga')
    						->where('user_id', Auth::id())->get();
    	return view('user.page.history',compact('data'));
    }
}
