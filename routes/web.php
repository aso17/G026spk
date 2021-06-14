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

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@process');
Route::get('/', 'DashboardController@index');
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
Route::get('/proses/nilai/{idkaryawan}', 'ProsesController@create');
//detail proses
Route::get('/detailproses', 'DetailProsesController@index');
Route::get('/pilih', 'DetailProsesController@pilih');
Route::get('/type', 'DetailProsesController@type');
Route::post('/detailproses/tambah', 'DetailProsesController@store');
Route::patch('/detailProses/ubah', 'DetailProsesController@update');

//alternatif
Route::post('/sanksi', 'SanksiController@store');