<?php

namespace App\Http\Controllers;

use App\alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
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
        $request->validate([
            'nama_alternatif' => 'required',

        ]);
        alternatif::create($request->all());
        return redirect('/kriteria')->with('success', 'data Alternatif berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(alternatif $alternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alternatif $alternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(alternatif $alternatif)
    {
        //
    }
}