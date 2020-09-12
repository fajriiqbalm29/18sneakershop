<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductUserController extends Controller
{
    public function tampil(){
    	$produk = Product::paginate(8);

	    $kategori = Category::all();

	    return view('user.page.product',compact('produk','kategori'));
    }

    public function tampilcat($id)
    {
    	$produk = Product::where('products.category_id',$id)->paginate(8);

	    $kategori = Category::all();

	    // dd($produk);

	    return view('user.page.product',compact('produk','kategori'));
    }

    public function cari(Request $request)
    {
    	// $cari = $request->cari;

    	// $kategori = Category::all();

    	// $produk = Product::where('nama_produk','like',"%".$cari."%")->paginate(8);

    	// dd($cari);	

    	// return view('user.page.product',compact('produk','kategori'));
    }

    public function carinama(Request $request)
    {
    	$cari = $request->cari;

    	$kategori = Category::all();

    	$produk = Product::where('nama_produk','like',"%".$cari."%")->paginate(8);

    	// dd($cari);	

    	return view('user.page.product',compact('produk','kategori'));
    }
}
