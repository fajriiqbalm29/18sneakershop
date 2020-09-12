<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat = Category::all();
        $data = Product::join('categories','products.category_id','=','categories.id')->take(8)->get();
        return view('user.page.home',compact('cat','data'));
    }

    
}
