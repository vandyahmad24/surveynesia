<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profil_user;
use App\Jenis_survey;
use App\Survey;
use DB;
use Carbon\Carbon;
use View;
class UserController extends Controller
{

    public function index()
    {
    	$auth = Auth::user()->id;
    	$profil = Profil_user::where('user_id',$auth)->first();
      $perkerjaan = DB::table('konfigurasi')->where('kategori','perkerjaan')->get();
      $jenis_survey = Jenis_survey::all();
      // dd($profil->foto);
    	if(isset($profil)){
    		return view('user.index',compact('profil','jenis_survey'));
    	}else{
    		return view('user.profil',compact('perkerjaan'));
    	}
    	
    }
    public function addProfil(Request $request)
    {
      $this->validate($request,[
        'nama' => 'required|string',
        'alamat' => 'required',
        'no_ktp' => 'required|numeric',
        'no_hp' => 'required|numeric',
        'upload' => 'required|image|max:6024'
      ]);
      $auth_id = Auth::user()->id;
      DB::table('users')->where('id',$auth_id)->update([
        'name' => $request->nama
      ]);

    	$profil = new Profil_user;
    	$profil->alamat = $request->alamat;
    	$profil->no_identitas = $request->no_ktp;
    	$profil->perkerjaan = $request->perkerjaan;
    	$profil->no_hp = $request->no_hp;
    	$profil->user_id = $auth_id;
    	$file = $request->file('upload');
	    $nama_file = $request->no_ktp.".".$file->getClientOriginalExtension();
	    $tujuan_upload = 'upload/foto_profil';
	    $file->move($tujuan_upload,$nama_file);
    	$profil->foto = $nama_file;
    	$profil->save();
    	return redirect('/user')->with('status', 'Profil Berhasil diperbarui');
    }
    public function editUser()
    {
      $auth = Auth::user()->id;
      $profil = Profil_user::where('user_id',$auth)->first();
      $perkerjaan = DB::table('konfigurasi')->where('kategori','perkerjaan')->get();
      return view('user.edit_profil',compact('profil','perkerjaan'));
    }
    public function putUser(Request $request)
    {
      // dd($request->all());
      $auth = Auth::user()->id;
      $nama = DB::table('users')->where('id',$auth)->update([
        'name' => $request->nama
      ]);
      $profil = Profil_user::find($request->profil_id);
      $profil->alamat = $request->alamat;
      $profil->no_identitas = $request->no_ktp;
      $profil->perkerjaan = $request->perkerjaan;
      $profil->no_hp = $request->no_hp;
      if(isset($request->upload)){
        $file = $request->file('upload');
        $nama_file = $request->no_ktp.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload/foto_profil';
        $file->move($tujuan_upload,$nama_file);
        $profil->foto = $nama_file;
        $profil->save();
        return redirect('/user')->with('status', 'Profil Berhasil diperbarui');
      }else{
        $profil->save();
        return redirect('/user')->with('status', 'Profil Berhasil diperbarui');
      }
    }
    public function addSurvey($id)
    {
      dd($request->all());
        $jenis_survey = Jenis_survey::find($id);
        $provinsi = DB::table('indoregion_provinces')->get();
        $kategori = DB::table('konfigurasi')->where('kategori','kategori')->get();
        $waktu = DB::table('konfigurasi')->where('kategori','jangka_waktu')->orderBy('id','desc')->get();
        // dd($jangka_waktu);
        $auth = Auth::user()->id;
        $profil = Profil_user::where('user_id',$auth)->first();
        return view('user.add_survey',compact('profil','jenis_survey','provinsi','kategori','waktu'));
    }
    public function postSurvey(Request $request)
    {
        dd($request->all());
       $date    = Carbon::now();
       $end_time = $date->addWeeks(4)->format('Y-m-d');
       $provinsi = DB::table('provinces')->where('id',$request->provinsi)->first();
       $kabupaten = DB::table('kabupaten')->where('id',$request->kota)->first();
       $lokasi = $provinsi->name.",".$kabupaten->name;
       $auth = Auth::user()->id;
       $survey = new Survey;
       $survey->nama = $request->nama;
       $survey->jenis_id = $request->jenis_survey_id;
       $survey->user_id = $auth;
       $survey->surveyor_id = '0';
       $survey->tgl_selesai = $end_time;
       $survey->lokasi=$lokasi;
        $file = $request->file('upload');
        $nama_file = $request->nama.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload/surat_ket';
        $file->move($tujuan_upload,$nama_file);
        $survey->upload = $nama_file;
       $survey->deskripsi_survey = $request->deskripsi;


       // harga
       // $harga_dasar = DB::table('konfigurasi')->where('kategori','')


       
    }
  
}
