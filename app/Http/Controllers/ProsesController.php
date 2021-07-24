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
        $data['detailKaryawan'] = DB::table('normalisasi')

            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->groupBy('karyawan.id')
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

        $cek = DB::table('hasil')->where('hasil.karyawan_id', $id_karya)->first();
        if (empty($cek)) {


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

                $jml_bobot = count($bobot);
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
                // var_dump($min);
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
            // var_dump($bobot_w);
            // var_dump($bobot_w);
            // var_dump($row);
            // var_dump($v);
            // die;
            $hasil = round($v, 2);
            hasil::create([
                'karyawan_id' => $id_karya,
                'hasil' => $hasil,
                'status_pengajuan' => 'pending'

            ]);

            return redirect('/proses')->with('success', 'proses perhitungan karyawan berhasil');
        } else {
            return redirect('/proses')->with('error', 'proses perhitungan karyawan sudah dilakukan!!');
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
    public function show($id_karyawan)
    {
        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan', 'left')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria', 'left')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria', 'left')
            ->where('normalisasi.id_karyawan', $id_karyawan)->get();

        $data['karyawan'] = DB::table('karyawan')->where('karyawan.id', $id_karyawan)->first();


        return view('proses.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_karyawan)
    {
        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $id_karyawan)
            ->first();

        $data['karyawan'] = DB::table('karyawan')
            ->where('id', $id_karyawan)
            ->first();
        $data['kri'] = DB::table('kriteria')
            ->get();
        $data['hasil'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $id_karyawan)
            ->get();
        return view('proses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id_karyawan = $request->id_karyawan;
        Proses::orWhere('id_karyawan', $id_karyawan)
            ->where('id_kriteria', $request->id_kriteria)
            ->update([
                "id_subkriteria" => $request->idsubkriteria
            ]);


        $data['normalisasi'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $id_karyawan)
            ->first();

        $data['karyawan'] = DB::table('karyawan')
            ->where('id', $id_karyawan)
            ->first();
        $data['kri'] = DB::table('kriteria')
            ->get();
        $data['hasil'] = DB::table('normalisasi')
            ->join('karyawan', 'karyawan.id', '=', 'normalisasi.id_karyawan')
            ->join('kriteria', 'kriteria.id', '=', 'normalisasi.id_kriteria')
            ->join('subkriteria', 'subkriteria.id', '=', 'normalisasi.id_subkriteria')
            ->where('id_karyawan', $id_karyawan)
            ->get();
        return view('proses.edit', $data);
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