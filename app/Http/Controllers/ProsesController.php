<?php

namespace App\Http\Controllers;


use App\kriteria;
use App\Proses;
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
    public function cari()
    {
        $nik = $_GET['nik_karyawan'];
        $karyawan =  DB::table('karyawan')->where('nik_karyawan', $nik)->first();
        $data = [

            "id" => $karyawan->id,
            "nik_karyawan" => $karyawan->nik_karyawan,
            "nama_lengkap" => $karyawan->nama_lengkap,
            "status_karyawan" => $karyawan->status_karyawan,
            "departemen" => $karyawan->departemen,
            "jabatan" => $karyawan->jabatan,



        ];
        echo json_encode($data);
    }
    public function index()
    {

        $data['normalisasi'] = DB::table('normalisasi')
            ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->Join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->Join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')->get();
        $data['kriteria'] = DB::table('kriteria')->get();


        return view('proses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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