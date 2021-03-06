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
    Route::get('/karyawanedit/{karyawan}', 'KaryawanController@edit');
    Route::patch('/karyawan', 'KaryawanController@update');
    Route::delete('/karyawanhapus', 'KaryawanController@destroy');
    //kriteria
    Route::get('/kriteria', 'KriteriaController@index');
    Route::get('/kriteria/tambah', 'KriteriaController@create');
    Route::post('/kriteria', 'KriteriaController@store');
    Route::get('/kriteria/{kriteria}', 'KriteriaController@edit');
    Route::patch('/kriteria/{kriteria}', 'KriteriaController@update');
    Route::delete('/kriteria/', 'KriteriaController@destroy');
    //subkriteria
    Route::get('/Sub_kriteria/{subkriteria}', 'SubkriteriaController@index');
    Route::get('/sub_kriteria/tambah/{sub_kriteria}', 'SubkriteriaController@create');
    Route::post('/subkriteria', 'SubkriteriaController@store');
    Route::get('/subkriteria/{subkriteria}', 'SubkriteriaController@edit');
    Route::patch('/subkriteria/{subkriteria}', 'SubkriteriaController@update');
    Route::delete('/subkriteriadelete', 'SubkriteriaController@destroy');
    //Route::post('/proses/tambah', 'ProsesController@store');
    Route::get('/proses', 'ProsesController@index');
    Route::get('/cari', 'ProsesController@cari');
    Route::get('/prosesShow/{karyawan}', 'ProsesController@show');
    Route::get('/prosesEdit/{karyawan}', 'ProsesController@edit');
    Route::patch('/proses', 'ProsesController@update');
    //detail proses
    Route::get('/proses/{kriteria}', 'DetailProsesController@create');
    Route::post('/proses/tambah', 'DetailProsesController@store');
    Route::get('/proses/hitung/{id_karyawan}', 'ProsesController@create');
    Route::get('/detailproses', 'DetailProsesController@index');
    Route::get('/pilih', 'DetailProsesController@pilih');
    Route::get('/type', 'DetailProsesController@type');
    Route::post('/detailproses/tambah', 'DetailProsesController@store');
    // Route::post('/detailproses/tambah', 'ProsesController@store');
    Route::post('/detailProses/ubah', 'DetailProsesController@update');

    //sanksi
    Route::post('/sanksi', 'SanksiController@store');
    Route::patch('/sanksi', 'SanksiController@update');
    Route::put('/sanksi', 'SanksiController@ubah');
    Route::delete('/sanksi', 'SanksiController@destroy');
    //hasil
    Route::get('/hasil', 'HasilController@index');
    //report
    Route::get('/report', 'reportController@index');
    Route::post('/report', 'reportController@sort');
    Route::get('/cetak/{tgl_awal}/{tgl_ahir}/{sanksi}', 'reportController@cetak');
    //user
    Route::get('/user', 'UserController@index');
    Route::get('/user/tambah', 'UserController@create');
    Route::post('/user/tambah', 'UserController@store');
    Route::get('/user/{karywan_id}', 'UserController@edit');
    Route::patch('/user', 'UserController@update');
    Route::delete('/user', 'UserController@destroy');
    //logout
    Route::post('/logout', 'LoginController@logout');
});