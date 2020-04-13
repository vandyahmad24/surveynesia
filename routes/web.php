<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => ['cekuser','auth','activeuser'] ], function()
{  
	Route::get('/','UserController@index')->name('user');
	Route::post('/','UserController@addProfil')->name('add-profil');
	Route::post('/add-jenis-survey','UserController@PostJenisSurvey')->name('add-jenis-survey');
	Route::get('/add-survey/{id}','UserController@addSurvey')->name('add-survey');
	Route::get('/edit-user','UserController@editUser')->name('edit-profil-user');
	Route::post('/put-user','UserController@putUser')->name('put-profil-user');
	Route::post('/post-survey','UserController@postSurvey')->name('post-survey');
	Route::get('/get-pesanan/{id_survey}','UserController@getPesanan')->name('get-pesanan');
	Route::get('/delete-pesanan/{id_survey}','UserController@deletePesanan')->name('delete-pesanan');
	Route::get('/detail-pesanan/{id}','UserController@detailPesanan')->name('detail-pesanan');
	Route::get('/list-pesanan','UserController@listPesanan')->name('list-pesanan');
	Route::post('/upload-pembayaran','UserController@uploadPembayaran')->name('add-bukti-pembayaran');
	Route::get('/detail-mitra/{id}','UserController@detailMitra')->name('detail-mitra');
	Route::post('/upload-pembayaran-2','UserController@uploadPembayaran2')->name('add-bukti-pembayaran2');
	

});

Route::group(['prefix' => 'admin', 'middleware' => ['cekadmin','auth'] ], function()
{  
	Route::get('/','AdminController@index')->name('admin');
	Route::get('/show-profil/{id}','AdminController@showProfil')->name('show-profil');
	Route::get('/jenis-survey','AdminController@jenisSurvey')->name('jenis-survey');
	Route::get('/edit-jenis-survey/','AdminController@editJenisSurvey')->name('edit-jenis-survey');
	Route::post('/put-jenis-survey/','AdminController@putJenisSurvey')->name('put-jenis-survey');
	Route::get('/delete-jenis-survey/{id}','AdminController@deleteJenisSurvey')->name('delete-jenis-survey');
	Route::post('/add-konfigurasi/','AdminController@addKonfigurasi')->name('tambah-konfigurasi');
	Route::get('/konfigurasi/','AdminController@Konfigurasi')->name('konfigurasi');
	Route::get('/edit-konfigurasi/','AdminController@editKonfigurasi')->name('edit-konfigurasi');
	Route::post('/put-konfigurasi/','AdminController@putKonfigurasi')->name('put-konfigurasi');
	Route::get('/delete-konfigurasi/{id}','AdminController@deleteKonfigurasi')->name('delete-konfigurasi');
	Route::get('/daftar-user','AdminController@daftarUser')->name('daftar-user');
	Route::get('/daftar-mitra','AdminController@daftarMitra')->name('daftar-mitra');
	Route::post('/add-mitra','AdminController@addMitra')->name('add-mitra');
});

Route::group(['prefix' => 'mitra', 'middleware' => ['cekmitra','auth','activeuser'] ], function()
{  
	Route::get('/','MitraController@index')->name('mitra');
	Route::post('/put-profil','MitraController@putProfil')->name('put-profil-mitra');
	Route::get('/proses-survey','MitraController@prosesSurvey')->name('proses-survey');
	Route::get('/detail-laporan-harian/{id}','MitraController@detailSurvey')->name('detail-laporan-harian');
	Route::post('/add-laporan','MitraController@addProses')->name('add-proses-survey');
});
Route::group(['prefix' => 'operasional', 'middleware' => ['cekoperasional','auth'] ], function()
{  
	Route::get('/','OperasionalController@index')->name('operasional');
	Route::get('/daftar-survey','OperasionalController@daftarsurvey')->name('daftar-survey');
	Route::get('/detail-survey-operasional/{id}','OperasionalController@detailSurvey')->name('detail-survey-operasional');
	Route::get('/daftar-mitra-aktif','OperasionalController@daftarMitra')->name('daftar-mitra-aktif');
	Route::get('/pilih-surveyor/{id}','OperasionalController@pilihSurveyor')->name('pilih-surveyor');
	Route::get('/put-surveyor/{id_survey}/{id_mitra}','OperasionalController@putSurveyor')->name('put-surveyor');
});

Route::post('/get-kabupaten/','HomeController@getCity')->name('get-kabupaten');
Route::get('/get-otp','HomeController@getOtp')->name('get-otp')->middleware('auth');
Route::get('/resend-email','HomeController@resendEmail')->name('resend-email')->middleware('auth');
Route::get('/send-wa/{no_hp}','HomeController@sendWA')->name('send-wa')->middleware('auth');
Route::post('/verifikasi-otp','HomeController@verifikasiOtp')->name('verifikasi-otp')->middleware('auth');
Route::get('/cara-pembayaran','HomeController@caraPembayaran')->name('cara-pembayaran')->middleware('auth');

