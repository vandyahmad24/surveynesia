<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Survey;

class OperasionalController extends Controller
{
    public function index()
    {
    	$survey = Survey::where([['status','pending'],['bukti_pembayaran','!=',null]])->get();
    	return view('operasional.daftar_survey',compact('survey'));
    }
    public function detailSurvey($id)
    {
    	
       $survey = Survey::find($id);
       return view('operasional.detail_survey',compact('survey'));
    }
    public function daftarMitra()
    {
    	   $users = DB::table('users as u')
                        ->join('profil_mitra as pm', 'u.id', '=', 'pm.user_id')
                        ->where([['u.level','mitra'],['u.foto','!=',null]])
                        ->select('u.*', 'pm.*')
                        ->get();
            return view('operasional.daftar_mitra',compact('users'));
    }
    public function pilihSurveyor($id)
    {
        $survey = Survey::find($id);
        if($survey->lokasi=='wilayah bebas'){
            $users = DB::table('users as u')
                        ->join('profil_mitra as pm', 'u.id', '=', 'pm.user_id')
                        ->where([['u.level','mitra'],['u.foto','!=',null]])
                        ->select('u.*', 'pm.*')
                        ->inRandomOrder()
                        ->get();
             return view('operasional.pilih_surveyor',compact('users','survey'));
            
        }else{
            $users = DB::table('users as u')
                        ->join('profil_mitra as pm', 'u.id', '=', 'pm.user_id')
                        ->where([['u.level','mitra'],['u.foto','!=',null]])
                        ->select('u.*', 'pm.*')
                        ->orderBy('lokasi','asc')
                        ->get();
            return view('operasional.pilih_surveyor',compact('users','survey'));
        }
    }
}
