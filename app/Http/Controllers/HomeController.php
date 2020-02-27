<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
    public function getCity(Request $req)
    {
    		$kota =	DB::table('kabupaten')->where('province_id',$req->prov_id)->get();
    		return response()->json($kota);
    }
    
}
