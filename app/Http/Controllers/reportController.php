<?php

namespace App\Http\Controllers;

use App\karyawan;
use App\kriteria;
use App\sanksi;
use App\detail;
use App\hasil;
use App\Proses;
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
        var_dump($request);
    }
}