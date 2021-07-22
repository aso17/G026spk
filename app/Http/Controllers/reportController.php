<?php

namespace App\Http\Controllers;

use App\karyawan;
use App\kriteria;
use App\sanksi;
use App\detail;
use App\hasil;
use App\Proses;
use PDF;
// use Dompdf\Dompdf as DompdfDompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\PDF;
use Illuminate\Http\Request;

// use pdf;

class reportController extends Controller
{
    public function index()
    {
        $data['sanksi'] = sanksi::all();

        return view('report.index', $data);
    }

    public function sort(Request $request)
    {

        $rules = [
            'sanksi' => 'required|',
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ];

        $messages = [
            'sanksi.required' => 'jenis sanksi tidak boleh kosong!',
            'tgl_awal.required' => 'tanggal tidak boleh kosong!',
            'tgl_ahir.required' => 'tanggal tidak boleh kosong!',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->sanksi === 'semua') {
            $data['tgl_awal'] = $request->tgl_awal;
            $data['tgl_ahir'] = $request->tgl_ahir;
            $data['hasil'] = DB::table('hasil')
                ->join('karyawan', 'karyawan.id', '=', 'hasil.karyawan_id')
                ->join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
                ->where('tgl_pengajuan', '>=', $request->tgl_awal)
                ->where('tgl_pengajuan', '<=', $request->tgl_ahir)
                ->get();
            $data['sanksi'] = $request->sanksi;
            return view('report.daftar', $data);
        } else {
            $data['tgl_awal'] = $request->tgl_awal;
            $data['tgl_ahir'] = $request->tgl_ahir;
            $data['hasil'] = DB::table('hasil')
                ->join('karyawan', 'karyawan.id', '=', 'hasil.karyawan_id')
                ->join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
                ->orWhere('sanksi_id', '=', $request->sanksi)
                ->where('tgl_pengajuan', '>=', $request->tgl_awal)
                ->where('tgl_pengajuan', '<=', $request->tgl_ahir)
                ->get();
            $data['sanksi'] = $request->sanksi;

            return view('report.daftar', $data);
        }
    }

    public function cetak($tgl_awal, $tgl_ahir, $sanksi)
    {
        if ($sanksi === 'semua') {
            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_ahir'] = $tgl_ahir;
            $data['hasil'] = DB::table('hasil')
                ->join('karyawan', 'karyawan.id', '=', 'hasil.karyawan_id')
                ->join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
                ->where('tgl_pengajuan', '>=', $tgl_awal)
                ->where('tgl_pengajuan', '<=', $tgl_ahir)
                ->get();


            $pdf = PDF::loadview('report.pdf', $data)->setPaper('A4', 'potrait');
            return $pdf->stream('reportSanksi.pdf');
        } else {

            $data['hasil'] = DB::table('hasil')
                ->join('karyawan', 'karyawan.id', '=', 'hasil.karyawan_id')
                ->join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
                ->orWhere('sanksi_id', '=', $sanksi)
                ->where('tgl_pengajuan', '>=', $tgl_awal)
                ->where('tgl_pengajuan', '<=', $tgl_ahir)
                ->get();
            $pdf = PDF::loadview('report.pdf', $data)->setPaper('A4', 'potrait');
            return $pdf->stream('reportSanksi.pdf');
        }
    }
}