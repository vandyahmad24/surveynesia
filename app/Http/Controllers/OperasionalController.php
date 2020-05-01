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
use Redirect;

class OperasionalController extends Controller
{

    public function index()
    {
       $activity = DB::table('activity')->orderBy('id','desc')->paginate(20);
       return view('operasional.daftar_aktifitas',compact('activity'));
    }
    public function daftarsurvey()
    {
    	$survey = Survey::orderBy('id','desc')->get();
    	return view('operasional.daftar_survey',compact('survey'));
    }
    public function detailSurvey($id)
    {
    	
       $survey = Survey::find($id);
       $user = User::find($survey->user_id);
       $activity = DB::table('activity')->where('survey_id',$id)->get();
       $profil_mitra = DB::table('profil_mitra')->where('user_id',$survey->surveyor_id)->first();
       return view('operasional.detail_survey',compact('survey','activity','user','profil_mitra'));
    }
    public function detailPemesan($id)
    {
       $user = DB::table('users as u')
                        ->leftJoin('profil_user as pu', 'u.id','=','pu.user_id')
                        ->where('u.id',$id)
                        ->first();
      return view('operasional.detail_pemesan',compact('user'));
          
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


        return redirect('/operasional/daftar-survey')->with('success','Berhasil Melakukan Penugassan');
    }
    public function tolakSurvey(Request $request)
    {
      // dd($request->all());
      $survey = Survey::find($request->id_survey);
      $survey->status = 'tolak';
      $survey->save();

    DB::table('activity')->insert([
          'user_id' => $survey->user_id,
          'survey_id'=> $request->id_survey,
          'deskripsi' => 'survey '.$survey->nama.' ditolak karena '.$request->alasan,
          'tipe_aktivity' => 'survey_ditolak',
          'created_by' => Auth::user()->id,
          'created_at' => Carbon::now()
      ]);
      return Redirect::back()->with('danger', 'Survey Berhasil di Batalkan');
    }
    public function selesaiSurvey($id)
    {
       $survey = Survey::find($id);
       $survey->status = 'finish';
       $survey->save();

       $mitra = DB::table('profil_mitra')->where('user_id',$survey->surveyor_id)->update([
          'status' => 'available'
       ]);
       $activity = DB::table('activity')->insert([
          'user_id' => $survey->surveyor_id,
          'survey_id' => $survey->id,
          'deskripsi' => 'survey '.$survey->nama.' telah selesai dikerjakan',
          'tipe_aktivity' => 'selesai_survey',
          'created_by' => Auth::user()->id,
          'created_at' => Carbon::now()
       ]);
       return redirect('operasional/daftar-survey');
    }
}
