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
	
	

});

Route::group(['prefix' => 'admin', 'middleware' => ['cekadmin','auth'] ], function()
{  
	Route::get('/','AdminController@index')->name('admin');
});

Route::group(['prefix' => 'mitra', 'middleware' => ['cekmitra','auth'] ], function()
{  
	Route::get('/','MitraController@index')->name('mitra');
});

Route::post('/get-kabupaten/','HomeController@getCity')->name('get-kabupaten');
Route::get('/get-otp','HomeController@getOtp')->name('get-otp')->middleware('auth');
Route::get('/resend-email','HomeController@resendEmail')->name('resend-email')->middleware('auth');
Route::post('/verifikasi-otp','HomeController@verifikasiOtp')->name('verifikasi-otp')->middleware('auth');

