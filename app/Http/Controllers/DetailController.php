<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DetailController extends Controller
{
    public function detail($slug){

    	$produk = Product::where('slug',$slug)->first();
    	

    	return view('user.page.prod-detail',compact('produk'));

    }
}
