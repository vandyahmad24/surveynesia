<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Survey;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Mail\EmailAdmin;
use Illuminate\Support\Facades\Mail;

class OperasionalController extends Controller
{
    public function index()
    {
    	$survey = Survey::orderBy('id','desc')->get();
    	return view('operasional.daftar_survey',compact('survey'));
    }
    public function detailSurvey($id)
    {
    	
       $survey = Survey::find($id);
       $activity = DB::table('activity')->where('survey_id',$id)->get();
       return view('operasional.detail_survey',compact('survey','activity'));
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
                        ->where([['u.level','mitra'],['u.foto','!=',null],['pm.status','available']])
                        ->select('u.*', 'pm.*')
                        ->inRandomOrder()
                        ->get();

             return view('operasional.pilih_surveyor',compact('users','survey'));
            
        }else{
            $users = DB::table('users as u')
                        ->join('profil_mitra as pm', 'u.id', '=', 'pm.user_id')
                        ->where([['u.level','mitra'],['u.foto','!=',null]])
                        ->select('u.*', 'pm.*')
                         // ->orderBy('pm.lokasi','desc') sementara dulu
                        ->get();
            return view('operasional.pilih_surveyor',compact('users','survey'));
        }
    }
    public function putSurveyor($id_survey, $id_mitra)
    {
        $survey = Survey::find($id_survey);
        $mitra = User::find($id_mitra);
        $auth = Auth::user();
        DB::table('survey')->where('id',$id_survey)->update([
            'surveyor_id' => $id_mitra,
            'status' => 'proses',
            'updated_at' => Carbon::now()
        ]);
        DB::table('activity')->insert([
            'user_id' => $id_mitra,
            'survey_id' => $id_survey,
            'deskripsi' => "Survey ".$survey->nama." di Kerjakan oleh".$mitra->name,
            'tipe_aktivity' => 'assign_mitra',
            'created_by' => $auth->id,
            'created_at' => Carbon::now()
        ]);
        DB::table('profil_mitra')->where('user_id',$id_mitra)->update([
            'status' => 'assigned'
        ]);

         $content = [
          'subject' => "Assigned Suvey ".$survey->nama,
          'judul' => "Anda Mendapatkan Tugas Survey ".$survey->nama,
          'deskripsi' => "Akan Mendapatkan tugas survey untuk ".$survey->nama."diharapkan mengerjakan sebelum ".$survey->tgl_selesai,
          'link' => ""
      ];
      // dd($content['judul']);
      Mail::to($mitra->email)
          ->send(new EmailAdmin($content));


        return redirect('/operasional')->with('success','Berhasil Melakukan Penugassan');
    }
}
