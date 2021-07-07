<?php

namespace App\Http\Controllers;

use App\Proses;
use App\detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

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

        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $request->id_karyawan)
            ->first();

        $data['karyawan'] = DB::table('karyawan')
            ->where('id', $request->id_karyawan)
            ->first();
        $data['hasil'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $request->id_karyawan)

            ->get();
        $data['kri'] = DB::table('kriteria')
            ->get();
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




        $id_kr = DB::table('normalisasi')
            ->orWhere('id_kriteria', $request->id_kriteria)
            ->where('id_karyawan', $request->id_karyawan)
            ->first();
        // var_dump($id_kr);
        // die;
        if ($id_kr == null) {


            Proses::create([
                "id_karyawan" => $request->id_karyawan,
                "id_kriteria" => $request->id_kriteria,
                "id_subkriteria" => $request->idsubkriteria,

            ]);

            $data['normalisasi'] = DB::table('normalisasi')
                ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
                ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
                ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
                ->where('id_karyawan', $request->id_karyawan)
                ->first();

            $data['karyawan'] = DB::table('karyawan')
                ->where('id', $request->id_karyawan)
                ->first();
            $data['kri'] = DB::table('kriteria')
                ->get();
            $data['hasil'] = DB::table('normalisasi')
                ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
                ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
                ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
                ->where('id_karyawan', $request->id_karyawan)
                ->get();
            return view('detailProses.edit', $data);
        } else {

            return redirect('/proses')->with('warning', 'Kriteria tidak boleh sama!!');
        }
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