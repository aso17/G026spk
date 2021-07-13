<?php

namespace App\Http\Controllers;

use App\karyawan;
use App\kriteria;
use App\sanksi;
use App\detail;
use App\hasil;
use App\Proses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

        $data['hasil'] = DB::table('hasil')
            ->join('karyawan', 'karyawan.id', '=', 'hasil.karyawan_id')
            ->join('ketentuan_sanksi', 'ketentuan_sanksi.id', '=', 'hasil.sanksi_id')
            ->orWhere('sanksi_id', '=', $request->sanksi)
            ->where('tgl_pengajuan', '>=', $request->tgl_awal)
            ->where('tgl_pengajuan', '<=', $request->tgl_ahir)
            ->get();
        return view('report.daftar', $data);
    }
}