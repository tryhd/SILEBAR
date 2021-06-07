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
    return view('auths.login');
});

Route::get('/dashboard', 'DashboardController@index')->name('home')->middleware('auth');
route::get('/register','AuthController@Register')->name('register');
route::post('/register','AuthController@PostRegister')->name('postregister');
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@PostLogin')->name('postlogin');
route::post('/logout','AuthController@logout')->name('logout');
Route::resource('/user', 'UserController');

//Route::get('/home', 'HomeController@index')->name('home');
