<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use App\User;
use Auth;
use Redirect;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
    public function getCity(Request $req)
    {
    		$kota =	DB::table('indoregion_regencies')->where('province_id',$req->prov_id)->get();
    		return response()->json($kota);
    }
    public function getOtp()
    {
        return view('get_otp');
    }
    public function resendEmail()
    {
    	$auth = Auth::user();
    
    	$user = User::find($auth->id);
    	$user->otp = rand(1000,9999);
    	$user->save();
        // dd($user);

    	Mail::to($auth->email)
          ->send(new SendEmail($user));
         return Redirect::back()->with('status', 'Kami telah mengirimkan kode aktifasi baru di email anda');

    }
    public function verifikasiOtp(Request $request)
    {
    	$auth = Auth::user();
    	$user = User::find($auth->id);
    	$otp = implode("",$request->verifikasi);
    	if($user->otp == $otp ){
    		$user->otp = null;
    		$user->is_active = 1;
    		$user->email_verified_at = Carbon::now();
    		$user->updated_at = Carbon::now();
    		$user->save();
    		return redirect('/user');
    	}else{
    		 return Redirect::back()->with('gagal', 'Kode verifikasi yang anda masukkan salah');
    	}
    	

    }
    public function sendWA($no_hp)
    {
        $newNumber = preg_replace('/^0?/', '62', $no_hp);
        return redirect()->to("https://api.whatsapp.com/send?phone=".$newNumber);
    }

    public function caraPembayaran()
    {
     return view('user.cara_pembayaran');
    }

    
}
