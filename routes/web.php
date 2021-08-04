<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('web.index');
});



route::get('/homepage','WebController@index')->name('website');
route::get('/home-pelayanan','WebController@pelayanan')->name('web-pelayanan');
route::get('/home-kegiatan','WebController@kegiatan')->name('web-kegiatan');
Route::get('/home', 'DashboardController@index')->name('home')->middleware('auth');
Route::resource('/dashboard','DashboardController')->middleware('auth');

//Auth
route::get('/register','AuthController@Register')->name('register');
route::post('/register','AuthController@PostRegister')->name('postregister');
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@PostLogin')->name('postlogin');
route::post('/logout','AuthController@logout')->name('logout')->middleware('auth');

//Kelola User
Route::resource('/user', 'UserController')->middleware('auth');

//Pelayanan KTP
//Pengajuan KTP Pemula
Route::get('/pelayanan-selesai','PelayananController@index1')->name('pel-selesai')->middleware('auth');
Route::get('/pelayanan-proses','PelayananController@index2')->name('pel-proses')->middleware('auth');
Route::resource('/pelayanan', 'PelayananController')->middleware('auth');
route::get('/pelayanan-konfirmasi{id}','PelayananController@Konfirmasi')->name('pelayanan-konfirmasi')->middleware('auth');
route::get('/AddPemula','PelayananController@PengajuanKTPPemula')->name('ktppemula')->middleware('auth');
route::post('/KTPPemula','PelayananController@PostPengajuanKTPPemula')->name('postpemula')->middleware('auth');
route::get('/KTPPemula','PelayananController@KTPPemula')->name('indexpemula')->middleware('auth');

//Perubahan KTP

route::get('/pengajuan','PelayananController@AjukanPerubahanKTP')->name('ajukanubah')->middleware('auth');
//route::get('/perubahan','PelayananController@PerubahanKTP')->name('perubahanKTP');
route::get('/perubahan{id}','PelayananController@PerubahanKTP')->name('formperubahanKTP')->middleware('auth');
route::post('/perubahan{id}','PelayananController@PostEditKTPPemula')->name('postperubahanKTP')->middleware('auth');
Route::post('/KTPubahapprove{id}', 'PelayananController@updateapproveUbahKTP')->name('updateapproveubahKTP')->middleware('auth');
//KTP Pendatang
// route::get('/pendatangindex','PelayananController@KTPPendatangIndex')->name('pendatangindex');
route::get('/pendatang','PelayananController@PengajuanKTPPendatang')->name('formpendatang');
route::post('/pendatang','PelayananController@PostPengajuanKTPPendatang')->name('postpendatang');
// Route::get('/pendatangapprove{id}', 'PelayananController@approvektppendatang')->name('ktppendatangapprove');
// Route::post('/pendatangapprove{id}', 'PelayananController@updateapprovektppendatang')->name('updateapprovektppendatang');
//KTP Hilang
route::get('/hilang','PelayananController@CariKTPHilang')->name('carihilang')->middleware('auth');
route::get('/formhilang{id}','PelayananController@KTPHilang')->name('formktphilang')->middleware('auth');
route::Post('hilang{id}','PelayananController@KTPHilangStore')->name('storehilang')->middleware('auth');

//end Pelayanan KTP


//Kegiatan
Route::get('/kegiatan-posting','KegiatanController@index1')->name('kegi-selesai')->middleware('auth');
Route::get('/kegiatan-tinjau','KegiatanController@index2')->name('kegi-tinjau')->middleware('auth');
Route::resource('/kegiatan', 'KegiatanController')->middleware('auth');
Route::get('/kegiatan-konfirmasi{id}', 'KegiatanController@Konfirmasi')->name('kegiatan-konfirmasi')->middleware('auth');
Route::get('/posting', 'KegiatanController@posting')->name('postingkegiatan')->middleware('auth');
// Route::get('/postingPelayanan', 'KegiatanController@postingpelayanan')->name('postingpelayanan')->middleware('auth');
//end Kegiatan

//LAPORAN
Route::resource('/laporan', 'LaporanController')->middleware('auth');
Route::get('/laporanpelayanan', 'LaporanController@pelayananindex')->name('laporanpelayanan')->middleware('auth');
Route::get('/kegiatanpdf', 'LaporanController@kegiatanpdf')->name('kegiatanpdf')->middleware('auth');
Route::get('/Pelayananpdf', 'LaporanController@Pelayananpdf')->name('Pelayananpdf')->middleware('auth');

//KK
route::get('/kk-form','PelayananController@FormKK')->name('kk-form')->middleware('auth');
route::POST('/kk-post','PelayananController@PengajuanKKStore')->name('post-kk')->middleware('auth');
