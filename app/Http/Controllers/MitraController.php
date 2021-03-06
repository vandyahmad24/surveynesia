<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use App\User;
use App\Survey;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Hash;

class MitraController extends Controller
{
    public function index()
    {
    	$auth = Auth::user();
      // dd($auth->id);

    	$user =  DB::table('users as u')
	            ->join('profil_mitra as pm', 'u.id', '=', 'pm.user_id')
	            ->where('u.id','=',$auth->id)
	            ->select('u.*', 'pm.*')
	            ->first();
              // dd($user);
	     $provinsi = DB::table('indoregion_provinces')->get();
       // dd($user);
    	if(Auth::user()->foto==null){
    		return view('mitra.edit_profil',compact('user','provinsi'));
    	}else{
    		return view('mitra.home',compact('user'));
    	}
    }
    public function putProfil(Request $request)
    {
    
    	$this->validate($request,[
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'instansi' => 'required|string',
        'jumlah_anggota' => 'required|numeric',
        'no_hp' => 'required|numeric',
        'alamat' => 'required|string',
        'provinsi' => 'required|string',
        'kota' => 'required|string',
        'no_rek' => 'required|numeric'
      ]);

    	$file = $request->file('upload');
	    $nama_file = $request->name."_".$request->id.".".$file->getClientOriginalExtension();
	    $tujuan_upload = 'upload/foto_profil';
	    $file->move($tujuan_upload,$nama_file);

    	User::where('id',$request->id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'level' => 'mitra',
            'foto' => $nama_file,
            'updated_at' => Carbon::now()
        ]);

       DB::table('profil_mitra')->where('user_id',$request->id)->update([
       		'alamat' => $request->alamat,
       		'instansi' => $request->instansi,
       		'no_hp' => $request->no_hp,
       		'jumlah_anggota' => $request->jumlah_anggota,
       		'provinsi' => $request->provinsi,
       		'kabupaten' => $request->kota,
          'no_rek' => $request->nama_bank."-".$request->no_rek,
       		'updated_at' => Carbon::now()
       ]);	
       return redirect('/mitra');
    }
    public function prosesSurvey()
    {
    	$id = Auth::user()->id;
    	$survey = Survey::where([['surveyor_id',$id],['status','proses']])->get();
    	return view('mitra.proses_survey',compact('survey'));
    }
    public function detailSurvey($id)
    {
        $survey = Survey::find($id);
        $activity = DB::table('activity')->where('survey_id',$id)->get();
        $profil = DB::table('profil_user')->where('user_id');
        $user_pembuat = User::find($survey->user_id);
        // dd($user_pembuat);
        return view('mitra.add_proses',compact('survey','activity','user_pembuat'));
    }
    public function addProses(Request $request)
    {
        DB::table('activity')->insert([
          'user_id' => Auth::user()->id,
          'survey_id' => $request->survey_id,
          'deskripsi' => $request->deskripsi,
          'tipe_aktivity' => 'laporan_harian',
          'created_by' => Auth::user()->id,
          'created_at' => Carbon::now(),
        ]);
         return Redirect::back()->with('success', 'Laporan Harian Berhasil di tambahkan');
    }
    public function finishSurvey()
    {
      $survey_finish = Survey::where('surveyor_id',Auth::user()->id)->get();

     return view('mitra.finish_survey',compact('survey_finish'));
    }
  
}
