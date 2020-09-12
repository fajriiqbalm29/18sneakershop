<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\user;
use App\Product;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Transaction::join('users','transactions.user_id','users.id')
                            ->join('products', 'transactions.produk_id', 'products.id')
                            ->select('transactions.*', 'products.nama_produk')
                            ->OrderBy('created_at','desc')
                            ->get();
        

        // dd($trans);
         return view('seller.page.transaksi',compact('trans'));
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
        //
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
        $data = Transaction::join('users','transactions.user_id','users.id')
                            ->join('products', 'transactions.produk_id', 'products.id')
                            ->select('transactions.*', 'products.nama_produk','products.stok')
                            ->where('transactions.id',$id)
                            ->first();

        return view('seller.page.ubahstatus',compact('data'));
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
        $trans = Transaction::find($id);

        $trans->status = $request->status;

        if ($trans->staus == 3) {

            $kurang = $request->stok - $request->quantity;
            $trans->stok = $kurang;
            # code...
        }

        $trans->save();
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
        //
    }
}
