<?php

namespace App\Http\Controllers;

use App\subkriteria;
use App\kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kode)
    {
        $data['kriteria'] = DB::table('kriteria')->where('id', $kode)->first();
        $data['subkriteria'] = DB::table('subkriteria')
            ->where('id_kriteria', $kode)
            ->get();


        return view('sub_kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kode)
    {
        $data['kriteria'] = DB::table('kriteria')->where('id', $kode)->first();

        return view('sub_kriteria.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_kriteria = $request->id_kriteria;
        $request->validate([

            'sub_kriteria' => 'required',
            'bobot_subkriteria' => 'required|numeric',

        ]);
        Subkriteria::create([
            'id_kriteria' => $id_kriteria,
            'sub_kriteria' => $request->sub_kriteria,
            'bobot_subkriteria' => $request->bobot_subkriteria,

        ]);

        return redirect('/Sub_kriteria/' . $id_kriteria)->with('success', 'sub kriteria berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(subkriteria $subkriteria)
    {

        return view('sub_kriteria.edit', ['subkriteria' => $subkriteria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subkriteria $subkriteria)
    {
        subkriteria::where('id', $subkriteria->id)
            ->update([
                'sub_kriteria' => $request->sub_kriteria,
                'bobot_subkriteria' => $request->bobot_subkriteria,
            ]);

        return redirect('/Sub_kriteria/' . $subkriteria->id_kriteria)->with('success', 'data Subkriteria berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_subkriteria = $request->id_sub;
        $id_kriteria = $request->id_k;

        DB::table('normalisasi')->where('id_subkriteria', '=', $id_subkriteria)->delete();
        subkriteria::destroy($id_subkriteria);
        return redirect('/Sub_kriteria/' . $id_kriteria)->with('success', 'data Subkriteria berhasil di delete');
    }
}