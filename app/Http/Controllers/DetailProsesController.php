<?php

namespace App\Http\Controllers;

use App\Proses;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_kriteria)
    {

        // DB::table('karyawan')->where('nik_karyawan', $nik)->delete();
        $data['kriteria'] = DB::table('kriteria')->where('id', $id_kriteria)->first();
        // dd($data['kriteria']);
        $data['subkriteria'] = DB::table('subkriteria')->where('id_kriteria', $id_kriteria)->get();
        return view('proses.prosesdetail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nik_karyawan' => 'required',
            'id_subkriteria' => 'required',

        ]);
        Proses::create([
            "id_karyawan" => $request->id_karyawan,
            "id_kriteria" => $request->id_kriteria,
            "id_subkriteria" => $request->id_subkriteria
        ]);

        return redirect('/proses')->with('success', 'penilaian berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function show(Proses $proses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function edit(Proses $proses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proses $proses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proses $proses)
    {
        //
    }
}