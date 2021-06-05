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
        $output .= '<input type="hidden" id="id_kriteria" name="id_kriteria" value="' . $tipe->id . '">';
        return response()->json($output);
    }
    public function index($id_alternatif)
    {

        $data['normalisasi'] = DB::table('normalisasi')
            ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->Join('kriteria', 'kriteria.id', '=', 'subkriteria.id_kriteria')
            ->Join('subkriteria as subk', 'subk.id', '=', 'normalisasi.C1')
            ->Join('subkriteria as sub', 'sub.id as sub.id_', '=', 'normalisasi.C2')
            ->Join('subkriteria', 'subkriteria.id as id3', '=', 'normalisasi.C3')
            ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->where('normalisasi.id_alternatif', $id_alternatif)
            // ->select('normalisasi.*')
            ->get();
        $data['alternatif'] = DB::table('alternatif')->where('id', $id_alternatif)->first();
        $data['kriteria'] = DB::table('kriteria')->get();
        $id = $data['alternatif']->id;
        Proses::create([
            "id_alternatif" => $id,

        ]);

        return view('detailProses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data['kriteria'] = DB::table('kriteria')->get();
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
        //dd($request->id_alternatif);
        $request->validate([
            'nik_karyawan' => 'required',
            'idkriteria' => 'required',
            'idsubkriteria' => 'required',

        ]);
        $data['normalisasi'] = DB::table('normalisasi')
            ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            //->Join('kriteria', 'kriteria.id', '=', 'subkriteria.id_kriteria')
            ->Join('subkriteria as subk', 'subk.id', '=', 'normalisasi.C1')
            //->Join('subkriteria as sub', 'sub.id', '=', 'normalisasi.C2')
            // ->Join('subkriteria', 'subkriteria.id as su.id1', '=', 'normalisasi.C3')
            ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->where('normalisasi.id_alternatif', $request->id_alternatif)
            // ->select('normalisasi.*')
            ->get();
        $data['kriteria'] = DB::table('kriteria')->get();
        $data['alternatif'] = DB::table('alternatif')->where('id', $request->id_alternatif)->first();
        $id_kriteria = $request->id_kriteria;
        $datakriteria = DB::table('kriteria')->where('id', $id_kriteria)->first();
        $datanormalisasi = DB::table('normalisasi')->where('id_alternatif', $request->id_alternatif)->first();
        $kriteria = $datakriteria->kode_kriteria;
        if ($kriteria == "C1") {
            DB::table('normalisasi')
                ->where('id', $datanormalisasi->id)
                ->update([
                    "id_karyawan" => $request->id_karyawan,
                    "C1" => $request->idsubkriteria,
                ]);

            return view('detailProses.index', $data);
        }
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