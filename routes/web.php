<?php

use Illuminate\Support\Facades\Route;
// use \App\Http\Middleware;

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


Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@store');
Route::group(['middleware' => 'CekLogin'], function () {
    Route::get('/Dashboard', 'DashboardController@index');
    //karywan
    Route::get('/Karyawan', 'KaryawanController@index');
    Route::get('/karyawan/tambah', 'KaryawanController@create');
    Route::post('/karyawan', 'KaryawanController@store');
    Route::get('/karyawan/{karyawan}', 'KaryawanController@show');
    Route::delete('/karyawanhapus', 'KaryawanController@destroy');
    //kriteria
    Route::get('/kriteria', 'KriteriaController@index');
    Route::get('/kriteria/tambah', 'KriteriaController@create');
    Route::post('/kriteria', 'KriteriaController@store');
    //subkriteria
    Route::get('/Sub_kriteria/{sub_kriteria}', 'SubkriteriaController@index');
    Route::get('/sub_kriteria/tambah/{sub_kriteria}', 'SubkriteriaController@create');
    Route::post('/subkriteria', 'SubkriteriaController@store');
    Route::get('/proses', 'ProsesController@index');
    //Route::post('/proses/tambah', 'ProsesController@store');
    Route::get('/cari', 'ProsesController@cari');
    Route::get('/proses/{kriteria}', 'DetailProsesController@create');
    Route::post('/proses/tambah', 'DetailProsesController@store');
    Route::get('/proses/hitung/{id_karyawan}', 'ProsesController@create');
    //detail proses
    Route::get('/detailproses', 'DetailProsesController@index');
    Route::get('/pilih', 'DetailProsesController@pilih');
    Route::get('/type', 'DetailProsesController@type');
    Route::post('/detailproses/tambah', 'DetailProsesController@store');
    // Route::post('/detailproses/tambah', 'ProsesController@store');
    Route::post('/detailProses/ubah', 'DetailProsesController@update');

    //sanksi
    Route::post('/sanksi', 'SanksiController@store');
    //hasil
    Route::get('/hasil', 'HasilController@index');
    //user
    Route::get('/user', 'UserController@index');
    Route::get('/user/tambah', 'UserController@create');
    Route::post('/user/tambah', 'UserController@store');
    //logout
    Route::post('/logout', 'LoginController@logout');
});