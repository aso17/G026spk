<?php

namespace App\Http\Controllers;


use App\kriteria;
use App\sanksi;
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

        // $data['normalisasi'] = DB::table('normalisasi')
        //     ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
        //     ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
        //     ->orderBy('normalisasi.id', 'DESC')
        //     ->limit(3)
        //     ->get();
        // $data['alternatif'] = DB::table('alternatif')->get();
        // $data['idkaryawan'] = DB::table('normalisasi')
        //     ->orderBy('normalisasi.id_karyawan', 'DESC')
        //     ->limit(1)
        //     ->get();
        $data['ketentuan'] = sanksi::all();
        return view('proses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($idkaryawan)
    {



        // $alternatif = array();
        $kriteria[] = array();
        // $r = array();
        // $kriteria[] = 'C1';
        // $kriteria[] = 'C2';
        // $kriteria[] = 'C3';
        // $kriteria[] = 'C4';


        // var_dump($kriteria);


        // $alternatif[] = array('a1', 3, 2, 3, 4);
        // $alternatif[] = array('a2', 2, 4, 3, 3);
        // $alternatif[] = array('a3', 4, 5, 5, 5);
        // var_dump($alternatif);
        // $index_alternatif = 0;
        // foreach ($alternatif as $alt) {
        //     $index_kriteria = 0;
        //     foreach ($kriteria as $kr) {
        //         if ($kr == 'C1' || $kr == 'C2') {

        //             $r[$index_alternatif][$index_kriteria] = min(array_column($alternatif, $index_kriteria)) / $alternatif[$index_alternatif][$index_kriteria];
        //         } elseif ($kr == 'C3' || $kr == 'C4') {
        //             $r[$index_alternatif][$index_kriteria] = $alternatif[$index_alternatif][$index_kriteria] / max(array_column($alternatif, $index_kriteria));
        //             // $r[$index_alternatif][$index_kriteria] = $alternatif[$index_alternatif][$index_kriteria]  / max(array_column($alternatif, $index_kriteria));
        //         }
        //         $index_kriteria++;
        //     }
        //     $index_alternatif++;
        // }
        // echo '<pre>';
        // print_r($r);
        // echo '</pre>';

        // var_dump($kriteria);
        // die;
        $alter = [];
        $K1 = [];
        $K2 = [];
        $K3 = [];
        $r = [];
        $kriteria = [];
        $data = [];
        //$id = [];


        $kriteria[] = 'C1';
        $kriteria[] = 'C2';
        $kriteria[] = 'C3';




        $data['normalisasi'] = DB::table('normalisasi')
            ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
            ->where('normalisasi.id_karyawan', $idkaryawan)
            ->get();
        foreach ($data['normalisasi'] as $kri) {
            $K1[] = $kri->C1;
            $K2[] = $kri->C2;
            $K3[] = $kri->C3;

            $alter[] = [
                $kri->C1,
                $kri->C2,
                $kri->C3
            ];

            $index_al = 0;
            foreach ($alter as $alt) {
                $index_kr = 0;
                foreach ($kriteria as $kr) {
                    $r[$index_al][$index_kr] = min(array_column($alter, $index_kr)) / $alter[$index_al][$index_kr];
                    $index_kr++;
                }
                $index_al++;
            }
            echo '<pre>';
            print_r($r);
            echo '</pre>';
        }
        //->toArray();

        // $index_al = 0;
        // foreach ($data as $d) {
        //     $id = $d->id_alternatif;
        //     $id_karyawan = $d->id_karyawan;

        //     $dat = DB::table('normalisasi')
        //         ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
        //         ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
        //         ->where('normalisasi.id_karyawan', $idkaryawan)
        //         ->first();


        //     



        //     foreach ($alter as $alt) {

        //         $index_kr = 3;
        //         foreach ($kriteria as $kr) {
        //             if ($kr == 'C1' || $kr == 'C2') {

        //                 $r[$index_al][$index_kr] = min(array_column($alter, $index_kr)) / $alter[$index_al][$index_kr];
        //             } elseif ($kr == 'C3' || $kr == 'C4') {
        //                 // $r[$index_al][$index_kr] = $alter[$index_al][$index_kr] / max(array_column($alter, $index_kr));
        //                 // $r[$index_alternatif][$index_kriteria] = $alternatif[$index_alternatif][$index_kriteria]  / max(array_column($alternatif, $index_kriteria));
        //             }
        //             $index_kr++;
        //         }
        //         $index_al++;
        //     }
        // }

        // echo '<pre>';
        // print_r($r);
        // echo '</pre>';



        // $dataall[] = $data;
        // $alter = array();
        // $kriteria = array();
        // $r = array();
        // $index_kr = 0;
        // $kriteria[] = $data[0]->C1;

        // $kriteria[] = 'C1';
        // $kriteria[] = 'C2';
        // $kriteria[] = 'C3';
        // foreach ($data as $da) {
        //     // $kriteria[] = $data[0]->C1;

        //     // $kriteria[] = $data[1]->C2;
        //     // $kriteria[] = $data[2]->C3;

        //     $id = $da->id_alternatif;
        //     $alternatif = DB::table('normalisasi')
        //         ->Join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
        //         ->Join('alternatif', 'alternatif.id', '=', 'normalisasi.id_alternatif')
        //         ->where('normalisasi.id_karyawan', $idkaryawan)
        //         ->where('normalisasi.id_alternatif', $id)
        //         ->first();
        //     $alter[] = $alternatif->C1;
        //     $alter[] = $alternatif->C2;
        //     $alter[] = $alternatif->C3;

        //     $index_al = 0;
        //     foreach ($alter as $alt) {

        //         $index_kr = 0;

        //         foreach ($kriteria as $kr) {
        //             // var_dump($index_kr);
        //             // die;
        //             // $r[$index_al][$index_kr] = min(array_column($data, 'C1')) / $alter[$index_al][$index_kr];
        //             $index_kr++;
        //         }
        //         $index_al++;
        //         var_dump($index_kr);
        //     }
        //  }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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