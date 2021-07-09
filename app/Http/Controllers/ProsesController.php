<?php

namespace App\Http\Controllers;


use App\karyawan;
use App\kriteria;
use App\sanksi;
use App\detail;
use App\hasil;
use App\Proses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use PHPUnit\Framework\Constraint\Count;

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
        $data['detailKaryawan'] = DB::table('karyawan')

            ->whereIn('id', function ($query) {
                $query->select('id_karyawan')
                    ->from('normalisasi');
            })
            ->orderBy('karyawan.id', 'DESC')
            ->get();
        return view('proses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id_karya)
    {


        $karyawan = DB::table('normalisasi')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('normalisasi.id_karyawan', '=', $id_karya)
            ->get();





        $normalisasi = DB::table('karyawan')
            ->whereIn('id', function ($query) {
                $query->select('id_karyawan')
                    ->from('normalisasi');
            })
            ->get();
        foreach ($normalisasi as $n) {
            $id_k[] = $n->id;
        }
        $jml = count($id_k);

        $row = [];
        $alter = [];
        $kriteria = [];
        // $kode_kriteria = 0;
        foreach ($karyawan as $karya) {
            $bobot[] = $karya->bobot_subkriteria;
            $type[] = $karya->type;


            // $kriteria[] = $karya->kode_kriteria;
            $jml_bobot = count($bobot);
            // $jml_kriteria = count($kriteria);
            // for ($index_bobot = 0; $index_bobot < $jml_bobot; $index_bobot++) {
            //     for ($index_kriteria = 0; $index_kriteria < $jml_kriteria; $index_kriteria++) {
            //         if ($type[$id_kriteria] == 'cost') {
            //             $min = DB::table('normalisasi')
            //                 ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria', 'left')
            //                 ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria', 'left')
            //                 ->where('kode_kriteria', $kriteria[$kode_kriteria])
            //                 ->min('bobot_subkriteria');
            //             $row[$index_kriteria] = round($min / $bobot[$index_bobot], 2);
            //         } elseif ($type[$id_kriteria] == 'Banefit') {
            //             $max = DB::table('normalisasi')
            //                 ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria', 'left')
            //                 ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria', 'left')
            //                 ->where('id_karyawan', $id_karya)
            //                 ->max('bobot_subkriteria');
            //             $row[$index_kriteria] = round($bobot[$index_bobot] / $max, 2);
            //         }
            //         $kode_kriteria++;
            //     }
            // }
            // $id_kriteria++;

        }
        $kriteria = DB::table('kriteria')
            ->get();
        $index_al = 0;
        for ($index_karayawan = 0; $index_karayawan < $jml; $index_karayawan++) {
            $alter['data'] = DB::table('normalisasi')
                ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria', 'left')
                ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria', 'left')
                ->where('id_karyawan', $id_k[$index_karayawan])
                ->groupBy('normalisasi.id_kriteria')
                ->orderBy('normalisasi.id_kriteria')
                ->get()->toArray();
            $alternatif[] = array_column($alter['data'], 'bobot_subkriteria');
            // $id_kr = 0;
        }
        $index_alternatif = 0;
        foreach ($alternatif as $al) {
            $index_kriteria = 0;
            foreach ($type as $kr) {

                $max[] = max(array_column($alternatif, $index_kriteria));
                $min[] = min(array_column($alternatif, $index_kriteria));
                $index_kriteria++;
            }
        }
        for ($index_bobot = 0; $index_bobot < $jml_bobot; $index_bobot++) {
            if ($type[$index_bobot] == 'cost') {
                $row[$index_bobot] = round($min[$index_bobot] / $bobot[$index_bobot], 2);
            } else {

                $row[$index_bobot] = round($bobot[$index_bobot] / $max[$index_bobot], 2);
            }
        }



        $W = DB::table('kriteria')->get();
        $v = 0;
        $index_w = 0;
        foreach ($W as $row_w) {
            $bobot_w[] = $row_w->bobot;
        }
        foreach ($row as $r) {
            $v +=  $bobot_w[$index_w] * $r;
            $index_w++;
        }
        $hasil = round($v, 2);

        // var_dump($hasil);
        // die;
        hasil::create([
            'karyawan_id' => $id_karya,
            'hasil' => $hasil,
            'status_pengajuan' => 'pending'

        ]);

        return redirect('/proses')->with('success', 'proses perhitungan karyawan berhasil');



        // foreach ($alter as $alt) {
        //         $index_r = 0;
        //         $v = 0;
        //         foreach ($kriteria as $kr) {
        //             $v += $w[$index_w] * $r[$index_al][$index_r];
        //             $index_r++;
        //             $index_w++;
        //         }
        //         $nilai_v[$index_al] = $v;
        //         $index_al++;
        // $iddetail = $deta->id;
        // $cek = DB::table('hasil')
        //     ->where('id_detail', '=', $iddetail)
        //     ->first();

        // if (empty($cek)) {



        //     $alter = [];

        //     $kriteria = [];
        //     $data = [];
        //     $bobot = [];

        //     $kriteria[] = 'C1';
        //     $kriteria[] = 'C2';
        //     $kriteria[] = 'C3';

        //     $data['detail'] = DB::table('detail_normalisasi')
        //         ->Join('karyawan', 'karyawan.id', '=', 'detail_normalisasi.id_karyawan')
        //         ->where('detail_normalisasi.id_karyawan', $id_karya)
        //         ->get();
        //     $min_c1 = DB::table('detail_normalisasi')->min('bobot_c1');
        //     $max_c2 = DB::table('detail_normalisasi')->max('bobot_c2');
        //     $max_c3 = DB::table('detail_normalisasi')->max('bobot_c3');

        //     $data['hitung'] = DB::table('detail_normalisasi')->get();
        //     foreach ($data['detail'] as $kri) {
        //         $alter[] = [
        //             $kri->bobot_c1,
        //             $kri->bobot_c2,
        //             $kri->bobot_c3,
        //         ];
        //         $index_al = 0;
        //         foreach ($alter as $alt) {
        //             $index_kr = 0;
        //             foreach ($kriteria as $kr) {
        //                 if ($kr == 'C1') {
        //                     $r[$index_al][$index_kr] = round($min_c1 / $alter[$index_al][$index_kr], 2);
        //                 } elseif ($kr == 'C2') {
        //                     $r[$index_al][$index_kr] = round($alter[$index_al][$index_kr] / $max_c2, 2);
        //                 } else {
        //                     $r[$index_al][$index_kr] = round($alter[$index_al][$index_kr] / $max_c3, 2);
        //                 }
        //                 $index_kr++;
        //             }
        //             $index_al++;
        //         }


        // $dat = DB::table('kriteria')->get();
        //     $index_w = 0;

        //     $w[] = $dat[0]->bobot;
        //     $w[] = $dat[1]->bobot;
        //     $w[] = $dat[2]->bobot;

        //     //foreach ($w as $b) {
        //     $index_al = 0;
        //     foreach ($alter as $alt) {
        //         $index_r = 0;
        //         $v = 0;
        //         foreach ($kriteria as $kr) {
        //             $v += $w[$index_w] * $r[$index_al][$index_r];
        //             $index_r++;
        //             $index_w++;
        //         }
        //         $nilai_v[$index_al] = $v;
        //         $index_al++;
        //     }
        // }


        //     $hasil = $nilai_v[0];
        //     // var_dump($nilai_v);
        //     // die;
        //     $id_detail = $iddetail;


        //     hasil::create([
        //         'id_detail' => $id_detail,
        //         'hasil' => $hasil,
        //         'status_pengajuan' => 'pending'

        //     ]);

        //     return redirect('/proses')->with('success', 'proses perhitungan karyawan berhasil');
        // } else {
        //     return redirect('/proses')->with('warning', 'sudah dilakukan proses perhitungan!');
        //     }
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