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



        //proses insert data

        $data['alternatif'] = DB::table('alternatif')->where('id', $id_alternatif)->first();
        $data['kriteria'] = DB::table('kriteria')->get();
        // Proses::create([
        //     "id_alternatif" => $id_alternatif,

        // ]);


        // $data['normalisasi'] = DB::table('normalisasi')
        //     ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
        //     ->join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
        //     ->where('normalisasi.id_alternatif', $id_alternatif)
        //     ->first();
        return view('detailProses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        // $data['kriteria'] = DB::table('kriteria')->get();
        // $data['subkriteria'] = DB::table('subkriteria')->get();
        // return view('proses.prosesdetail', $data);
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

        //ambil data kriteria
        $data['kriteria'] = DB::table('kriteria')->get();
        // ambil data alternatif
        $data['alternatif'] = DB::table('alternatif')->where('id', $request->id_alternatif)->first();


        // ambil data kriteria
        $id_kriteria = $request->id_kriteria;
        $datakriteria = DB::table('kriteria')->where('id', $id_kriteria)->first();
        $kriteria = $datakriteria->kode_kriteria;
        // ambil data subkriteria
        $datasubkriteria = DB::table('subkriteria')->where('id', $request->idsubkriteria)->first();
        $bobot_sub = $datasubkriteria->bobot_subkriteria;
        // ambil data normalisasi
        $datanormalisasi = DB::table('normalisasi')->where('id_alternatif', $request->id_alternatif)->first();
        //$id_normalisasi = $datanormalisasi->id;


        // dd($datanor);



        if ($kriteria == "C1") {
            Proses::create([
                "id_karyawan" => $request->id_karyawan,
                "id_alternatif" => $request->id_alternatif,
                "C1" => $bobot_sub
            ]);
        } elseif ($kriteria == "C2") {
            Proses::create([
                "id_karyawan" => $request->id_karyawan,
                "id_alternatif" => $request->id_alternatif,
                "C2" => $bobot_sub
            ]);
        } else {
            Proses::create([
                "id_karyawan" => $request->id_karyawan,
                "id_alternatif" => $request->id_alternatif,
                "C3" => $bobot_sub
            ]);
        }

        //ambil data  normalisasi join
        $idal = $request->id_alternatif;
        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->where('normalisasi.id_alternatif', $idal)
            ->first();
        $data['alternatif'] = DB::table('alternatif')->where('id', $request->id_alternatif)->first();
        $data['kriteria'] = DB::table('kriteria')->get();

        return view('detailProses.edit', $data);
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
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proses  $proses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->id_alternatif);
        // ambil data kriteria
        $id_kriteria = $request->id_kriteria;
        $datakriteria = DB::table('kriteria')->where('id', $id_kriteria)->first();
        $kriteria = $datakriteria->kode_kriteria;

        // ambil data subkriteria
        $datasubkriteria = DB::table('subkriteria')->where('id', $request->idsubkriteria)->first();
        $bobot_sub = $datasubkriteria->bobot_subkriteria;

        $idnor = DB::table('normalisasi')->max('id');

        if ($kriteria == "C1") {
            DB::table('normalisasi')
                ->where('id', $idnor)
                ->update([

                    "C1" => $bobot_sub
                ]);
        } elseif ($kriteria == "C2") {
            DB::table('normalisasi')
                ->where('id', $idnor)
                ->update([

                    "C2" => $bobot_sub
                ]);
        } else {
            DB::table('normalisasi')
                ->where('id', $idnor)
                ->update([
                    "C3" => $bobot_sub
                ]);
        }
        //ambil data  normalisasi join
        $idal = $request->id_alternatif;
        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->where('normalisasi.id_alternatif', $idal)
            ->first();
        $data['alternatif'] = DB::table('alternatif')->where('id', $request->id_alternatif)->first();
        $data['kriteria'] = DB::table('kriteria')->get();


        return view('detailProses.edit', $data);
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