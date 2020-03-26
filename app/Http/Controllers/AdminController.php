<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Redirect;
class AdminController extends Controller
{
    public function index()
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
}
