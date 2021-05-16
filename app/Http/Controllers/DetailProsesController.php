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
    public function pilih()
    {

        $id = $_GET['id'];
        $data = DB::table('subkriteria')
            ->Join('kriteria', 'kriteria.id', '=', 'subkriteria.id_kriteria')
            ->where('id_kriteria', $id)
            ->get();
        $output = '<option selected hidden value="">-- pilih --
        </option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->sub_kriteria . '</option>';
        }

        return response()->json($output);
    }
    public function type()
    {
        $id = $_GET['id'];
        $tipe = DB::table('kriteria')->where('id', $id)->first();
        $output = '<span fo-box-text text-right font-weight-bold text-danger mr-3"></span>';
        $output .= '<span class="info-box-text text-right font-weight-bold text-danger mr-3">type : ' . $tipe->type . '</span>';
        return response()->json($output);
    }
    public function index($id_alternatif)
    {

        $data['alternatif'] = DB::table('alternatif')->where('id', $id_alternatif)->first();
        $data['kriteria'] = DB::table('kriteria')->get();

        return view('detailProses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // DB::table('karyawan')->where('nik_karyawan', $nik)->delete();
        $data['kriteria'] = DB::table('kriteria')->get();
        // dd($data['kriteria']);
        $data['subkriteria'] = DB::table('subkriteria')->get();
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