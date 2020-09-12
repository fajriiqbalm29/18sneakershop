<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::join('categories', 'products.category_id','categories.id')->select('products.*', 'categories.nama_category')->get();
        $category = Category::all();
        return view('seller.page.product', compact('product','category'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;

        $data->category_id = $request->catid;
        $data->nama_produk = $request->namaproduk;
        $data->slug = str::slug($request->namaproduk);
        $data->deskripsi = $request->deskproduk;
        $data->harga = $request->hargaproduk;
        $data->stok = $request->stok;

        $filename = time().$request->fotproduk->getClientOriginalName();

        $request->fotproduk->move(public_path('imgproduk/'),$filename);

        $data->foto = 'imgproduk/'.$filename;

        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where('id',$id)->first();
        $kategori = Category::all();

        return view('seller.page.editproduk', compact('data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);

        $data->category_id = $request->catid;
        $data->nama_produk = $request->namaproduk;
        $data->slug = str::slug($request->namaproduk);
        $data->deskripsi = $request->deskproduk;
        $data->harga = $request->hargaproduk;
        $data->stok = $request->stok;
        if ($request->fotproduk) {
            $filename = time().$request->fotproduk->getClientOriginalName();

            $request->fotproduk->move(public_path('imgproduk/'),$filename);

            $data->foto = 'imgproduk/'.$filename;
        }

        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back();
    }
}
