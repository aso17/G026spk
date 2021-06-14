<?php

namespace App\Http\Controllers;

use App\kriteria;
use App\alternatif;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kriteria'] = Kriteria::all();
        // $data['alternatif'] = alternatif::all();
        return view('kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.tambah');
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
            'kode_kriteria' => 'required|unique:kriteria|size:2',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'type' => 'required',
        ]);
        Kriteria::create($request->all());
        return redirect('/kriteria')->with('success', 'data kriteria berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(kriteria $kriteria)
    {
        //
    }
}