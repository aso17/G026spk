<?php

namespace App\Http\Controllers;

use App\kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['kriteria'] = DB::table('kriteria')->where('id', $kode)->first();
        $data['kriteria'] = DB::table('kriteria')->get();
        // dd($data['kriteria']);
        return view('proses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesdetail($id_kriteria)
    {
        // DB::table('karyawan')->where('nik_karyawan', $nik)->delete();
        $data['kriteria'] = DB::table('kriteria')->where('id', $id_kriteria)->first();
        // dd($data['kriteria']);
        $data['subkriteria'] = DB::table('subkriteria')->where('id_kriteria', $id_kriteria)->get();
        return view('proses.prosesdetail', $data);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request['subkriteria'], $request['idkriteria']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}