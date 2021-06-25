<?php

namespace App\Http\Controllers;


use App\kriteria;
use App\sanksi;
use App\detail;
use App\hasil;
use App\Proses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cari()
    {
        $nik = $_GET['nik_karyawan'];
        $karyawan =  DB::table('karyawan')->where('nik_karyawan', $nik)->first();

        $data = [

            "id_karyawan" => $karyawan->id,
            "nik_karyawan" => $karyawan->nik_karyawan,
            "nama_lengkap" => $karyawan->nama_lengkap,
            "status_karyawan" => $karyawan->status_karyawan,
            "departemen" => $karyawan->departemen,
            "jabatan" => $karyawan->jabatan,



        ];
        echo json_encode($data);
    }
    public function index()
    {



        $data['detail'] = DB::table('detail_normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
            ->get();



        return view('proses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($iddetail)
    {
        $cek = DB::table('hasil')
            ->where('id_detail', '=', $iddetail)
            ->first();
        // var_dump($cek);
        if (empty($cek)) {



            $alter = [];

            $kriteria = [];
            $data = [];
            $bobot = [];

            $kriteria[] = 'C1';
            $kriteria[] = 'C2';
            $kriteria[] = 'C3';

            $data['detail'] = DB::table('detail_normalisasi')
                ->Join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
                ->where('detail_normalisasi.id', $iddetail)
                ->get();
            $min_c1 = DB::table('detail_normalisasi')->min('bobot_c1');
            $max_c2 = DB::table('detail_normalisasi')->max('bobot_c2');
            $max_c3 = DB::table('detail_normalisasi')->max('bobot_c3');

            $data['hitung'] = DB::table('detail_normalisasi')->get();
            foreach ($data['detail'] as $kri) {
                $alter[] = [
                    $kri->bobot_c1,
                    $kri->bobot_c2,
                    $kri->bobot_c3,
                ];
                $index_al = 0;
                foreach ($alter as $alt) {
                    $index_kr = 0;
                    foreach ($kriteria as $kr) {
                        if ($kr == 'C1') {
                            $r[$index_al][$index_kr] = round($min_c1 / $alter[$index_al][$index_kr], 2);
                        } elseif ($kr == 'C2') {
                            $r[$index_al][$index_kr] = round($alter[$index_al][$index_kr] / $max_c2, 2);
                        } else {
                            $r[$index_al][$index_kr] = round($alter[$index_al][$index_kr] / $max_c3, 2);
                        }
                        $index_kr++;
                    }
                    $index_al++;
                }


                $dat = DB::table('kriteria')->get();
                $index_w = 0;

                $w[] = $dat[0]->bobot;
                $w[] = $dat[1]->bobot;
                $w[] = $dat[2]->bobot;

                //foreach ($w as $b) {
                $index_al = 0;
                foreach ($alter as $alt) {
                    $index_r = 0;
                    $v = 0;
                    foreach ($kriteria as $kr) {
                        $v += $w[$index_w] * $r[$index_al][$index_r];
                        $index_r++;
                        $index_w++;
                    }
                    $nilai_v[$index_al] = $v;
                    $index_al++;
                }
            }


            $hasil = $nilai_v[0];
            $id_detail = $iddetail;


            hasil::create([
                'id_detail' => $id_detail,
                'hasil' => $hasil,
                'status_pengajuan' => 'pending'

            ]);

            return redirect('/proses')->with('success', 'proses perhitungan karyawan berhasil');
        } else {
            return redirect('/proses')->with('warning', 'sudah dilakukan proses perhitungan!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->id_kriteria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}