<?php

namespace App\Http\Controllers;

use App\Proses;
use App\detail;
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
    public function index()
    {
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
        // dd($request->id_kriteria);

        $request->validate([
            'nik_karyawan' => 'required',
            'idkriteria' => 'required',
            'idsubkriteria' => 'required',

        ]);


        Proses::create([
            "id_karyawan" => $request->id_karyawan,
            "id_kriteria" => $request->id_kriteria,
            "id_subkriteria" => $request->idsubkriteria,

        ]);

        $kriteria = DB::table('kriteria')
            ->where('id', $request->id_kriteria)
            ->first();
        $kri = $kriteria->kode_kriteria;

        $subkriteria = DB::table('subkriteria')
            ->where('id', $request->idsubkriteria)
            ->first();
        $bobot = $subkriteria->bobot_subkriteria;
        // var_dump($bobot);
        // die;
        if ($kri == "C1") {
            detail::create([
                "id_karyawan" => $request->id_karyawan,
                "bobot_c1" => $bobot
            ]);
        } elseif ($kri == "C2") {
            detail::create([
                "id_karyawan" => $request->id_karyawan,
                "bobot_c2" => $bobot
            ]);
        } elseif ($kri == "C3") {
            detail::create([
                "id_karyawan" => $request->id_karyawan,
                "bobot_c3" => $bobot
            ]);
        } else {
            detail::create([
                "id_karyawan" => $request->id_karyawan,
                "bobot_c4" => $bobot
            ]);
        }



        // die;
        //ambil data  normalisasi join

        // $idnor = DB::table('normalisasi')->max('id');
        // $data['normalisasi'] = DB::table('normalisasi')
        //    
        //     ->where('normalisasi.id', $idnor)
        //     ->first();
        $data['kri'] = DB::table('kriteria')->get();

        $data['normalisasi'] = DB::table('detail_normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
            ->where('id_karyawan', $request->id_karyawan)
            ->first();
        // var_dump($data['normalisasi']);
        // die;
        // $data['subkriteria'] = DB::table('subkriteria')
        //     ->where('id', $request->idsubkriteria)
        //     ->get();

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
        $request->validate([
            'nik_karyawan' => 'required',
            'idkriteria' => 'required',
            'idsubkriteria' => 'required',

        ]);


        Proses::create([
            "id_karyawan" => $request->id_karyawan,
            "id_kriteria" => $request->id_kriteria,
            "id_subkriteria" => $request->idsubkriteria,

        ]);

        // ambil data kriteria
        $id_kriteria = $request->id_kriteria;
        $datakriteria = DB::table('kriteria')->where('id', $id_kriteria)->first();
        $kriteria = $datakriteria->kode_kriteria;

        // ambil data subkriteria
        $datasubkriteria = DB::table('subkriteria')->where('id', $request->idsubkriteria)->first();
        $bobot_sub = $datasubkriteria->bobot_subkriteria;

        $idnor = DB::table('detail_normalisasi')
            ->where('id_karyawan', $request->id_karyawan)
            ->first();
        $idkaryawan = $idnor->id_karyawan;

        if ($kriteria == "C1") {
            DB::table('detail_normalisasi')
                ->where('id_karyawan', $idkaryawan)
                ->update([
                    "bobot_c1" => $bobot_sub
                ]);
        } elseif ($kriteria == "C2") {
            DB::table('detail_normalisasi')
                ->where('id_karyawan', $idkaryawan)
                ->update([
                    "bobot_c2" => $bobot_sub
                ]);
        } elseif ($kriteria == "C3") {
            DB::table('detail_normalisasi')
                ->where('id_karyawan', $idkaryawan)
                ->update([
                    "bobot_c3" => $bobot_sub
                ]);
        }

        $data['kri'] = DB::table('kriteria')->get();
        $data['normalisasi'] = DB::table('detail_normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
            ->where('id_karyawan', $request->id_karyawan)
            ->first();

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