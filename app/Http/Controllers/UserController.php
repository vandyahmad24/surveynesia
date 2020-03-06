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
        $jenis_survey = Jenis_survey::find($id);
        $provinsi = DB::table('indoregion_provinces')->get();
        $kategori = DB::table('konfigurasi')->where('kategori','kategori')->get();
        $waktu = DB::table('konfigurasi')->where('kategori','jangka_waktu')->orderBy('id','desc')->get();
        $harga_dasar = DB::table('konfigurasi')->where('kategori','primary')->first();
        // dd($jangka_waktu);
        $auth = Auth::user()->id;
        $profil = Profil_user::where('user_id',$auth)->first();
        return view('user.add_survey',compact('profil','jenis_survey','provinsi','kategori','waktu','harga_dasar'));
    }
    public function postSurvey(Request $request)
    {
      // dd($request->all());
     $this->validate($request,[
        'nama' => 'required|string',
        'deskripsi' => 'required',
        'jumlah_data' => 'required',
        'kategori_survey' => 'required',
        'jangka_waktu' => 'required',
        'upload' => 'mimes:pdf,doc,docx,zip'
      ]);
     
      $survey = new Survey;
      if(isset($request->upload)){
        $file = $request->file('upload');
        $nama_file = $request->nama.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload/surat_ket';
        $file->move($tujuan_upload,$nama_file);
        $survey->upload = $nama_file;
      }

      if(isset($request->provinsi) && $request->provinsi!='0'){
         $provinsi = DB::table('indoregion_provinces')->where('id',$request->provinsi)->first();
         $kabupaten = DB::table('indoregion_regencies')->where('id',$request->kota)->first();
         $lokasi = $provinsi->name.",".$kabupaten->name;
      }else{
        $lokasi = 'wilayah bebas';
      }

       $date    = Carbon::now();
       $end_time = $date->addWeeks(4)->format('Y-m-d');
       $auth = Auth::user()->id;
       $survey->nama = $request->nama;
       $survey->jenis_id = $request->jenis_survey_id;
       $survey->user_id = $auth;
       
       $survey->tgl_selesai = $end_time;
       $survey->lokasi=$lokasi;
       $survey->deskripsi_survey = $request->deskripsi;

        // harga
       $harga_dasar = DB::table('konfigurasi')->where('kategori','primary')->first();
       $kategori_survey = DB::table('konfigurasi')->where('id',$request->kategori_survey)->first();
       $jangka_waktu = DB::table('konfigurasi')->where('id',$request->jangka_waktu)->first();
       
       $harga_survey = $harga_dasar->harga*$request->jumlah_data;
       $harga_kategori = $kategori_survey->harga/100*$harga_survey;
       $harga_waktu = $jangka_waktu->harga/100*$harga_survey;
       $total = $harga_survey+$harga_kategori+$harga_waktu;

       $survey->harga = $total;
       $survey->save();




       
    }
  
}
