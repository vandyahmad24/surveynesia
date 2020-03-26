<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
use App\User;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
	public function index()
	{
		$activity = DB::table('activity')->orderBy('id','desc')->get();
		return view('admin.list',compact('activity'));
	}
    public function jenisSurvey()
    {
    	$jenis_survey = DB::table('jenis_survey')->orderBy('id','desc')->get();
    	return view('admin.home',compact('jenis_survey'));
    }
    public function editJenisSurvey(Request $request)
    {

    	$jenis_survey = DB::table('jenis_survey')->where('id',$request->id)->first();
    	return response()->json($jenis_survey);
    }
    public function putJenisSurvey(Request $request)
    {
    	DB::table('jenis_survey')->where('id',$request->id)->update([
    		'nama_survey' => $request->nama_survey,
    		'deskripsi' => $request->deskripsi,
    		'icon' => $request->icon,
    		'is_active' => $request->is_active
    	]);
    	 return Redirect::back()->with('success', 'Jenis Survey Berhasil di Edit');
    }
    public function deleteJenisSurvey($id)
    {
    	DB::table('jenis_survey')->where('id',$id)->delete();
    	return Redirect::back()->with('delete', 'Jenis Survey Berhasil di Hapus');
    }
    public function Konfigurasi()
    {
    	$konfigurasi = DB::table('konfigurasi')->orderBy('kategori','desc')->get();
    	return view('admin.konfigurasi',compact('konfigurasi'));
    }
    public function addKonfigurasi(Request $request)
    {
    	// dd($request->all());
    	DB::table('konfigurasi')->insert([
    		'deskripsi' => $request->deskripsi,
    		'kategori' => $request->kategori,
    		'harga' => $request->harga
    	]);
    	 return Redirect::back()->with('success', 'Kategori Baru berhasil di tambahkan');
    }
    public function editKonfigurasi(Request $request)
    {
    	$konfigurasi = DB::table('konfigurasi')->where('id',$request->id)->first();
    	return response()->json($konfigurasi);
    }
    public function putKonfigurasi(Request $request)
    {
    	DB::table('konfigurasi')->where('id',$request->id)->update([
    		'kategori' => $request->kategori,
    		'deskripsi' => $request->deskripsi,
    		'harga' => $request->harga,
    	]);
    	 return Redirect::back()->with('success', 'Kategori Berhasil di Edit');
    }
    public function deleteKonfigurasi($id)
    {
    	DB::table('konfigurasi')->where('id',$id)->delete();
    	return Redirect::back()->with('delete', 'Konfigurasi Berhasil di Hapus');
    }
    public function daftarUser()
    {
    	$users = DB::table('users')->where('level','user')->orderBy('id','desc')->paginate(15);
    	return view('admin.daftar_user',compact('users'));
    }
    public function showProfil($id)
    {
    	$user = DB::table('users as u')
	            ->join('profil_user as pu', 'u.id', '=', 'pu.user_id')
	            ->where('u.id','=',$id)
	            ->select('u.*', 'pu.id as profil_id', 'pu.alamat as alamat','pu.no_identitas as no_identitas','pu.perkerjaan as perkerjaan','pu.no_hp as no_hp')
	            ->first();
	            // dd($user);
        return view('admin.user_detail',compact('user'));
    }
    public function daftarMitra()
    {
    	$mitra = DB::table('users')->where('level','mitra')->orderBy('id','desc')->paginate(15);
    	$provinsi = DB::table('indoregion_provinces')->get();
    	return view('admin.daftar_mitra',compact('mitra','provinsi'));
    }
    public function addMitra(Request $request)
    {
    	$this->validate($request,[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'instansi' => 'required|string',
        'jumlah_anggota' => 'required|numeric',
        'no_hp' => 'required|numeric',
        'alamat' => 'required|string',
        'provinsi' => 'required|string',
        'kota' => 'required|string',
      ]);
    	 
    	$user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('surveynesia123'),
            'level' => 'mitra',
            'is_active' => 0,
            'otp' =>rand(1000,9999)
        ]);
       Mail::to($request->email)
       ->send(new SendEmail($user));


       $provinsi = Province::find($request->provinsi);
       $kota = Regency::find($request->kota);


       DB::table('profil_mitra')->insert([
       		'alamat' => $request->alamat,
       		'instansi' => $request->instansi,
       		'no_hp' => $request->no_hp,
       		'jumlah_anggota' => $request->jumlah_anggota,
       		'provinsi' => $provinsi->name,
       		'kabupaten' => $kota->name,
       		'user_id' => $user->id,
       		'created_at' => Carbon::now()
       ]);	
       return Redirect::back()->with('success', 'Mitra Berhasil di tambahkan');
      


    }
}
