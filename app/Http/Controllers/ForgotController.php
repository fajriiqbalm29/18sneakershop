<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class ForgotController extends Controller
{
    public function cekemail(Request $request){
    	$data = User::where('email',$request->cekemail)->first();

    	if ($data != null) {
    		
    		return view('user.page.newpass',compact('data'));
    	}else{

    		return back();
    	}
    }

    public function index(){

    	return view('user.page.forgot');
    }

    public function ubahpassword(Request $request){
    	$data = User::where('email',$request->email)->first();

    	$data->password = bcrypt($request->password);

    	$data->save();
    	return view('user.page.passberhasi');
    }
}
