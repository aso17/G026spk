<?php

namespace App\Http\Controllers;

use App\hasil;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hasil_ahir'] = DB::table('hasil')
            ->Join('detail_normalisasi', 'detail_normalisasi.id', '=', 'hasil.id_detail')
            ->Join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
            // ->Join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
            // ->Join('detail_normalisasi', 'detail_normalisasi.id', '=', 'hasil.id_detail')
            ->get();
        $data['sanksi'] = DB::table('ketentuan_sanksi')
            ->get();

        return view('hasil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(hasil $hasil)
    {
        //
    }
}