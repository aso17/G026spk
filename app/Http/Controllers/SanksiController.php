<?php

namespace App\Http\Controllers;

use App\sanksi;
use App\hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_sanksi' => 'required',
            'nilai_ketentuan' => 'required',

        ]);
        sanksi::create($request->all());
        return redirect('/hasil')->with('success', 'data Sanksi berhasil di tambah');
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
    public function update(Request $request)
    {
        // dd($request->approve);
        // dd($id_detail = $request->id_deta);
        $cek1 = DB::table('hasil')
            ->where('hasil.id_detail', $request->id_detail)
            ->first();
        $cek2 = DB::table('hasil')
            ->where('hasil.id_detail', $request->id_deta)
            ->first();

        if (session('jabatan') == 'Spv') {

            if (empty($cek1)) {
                DB::table('hasil')
                    ->where('hasil.id_detail', $request->id_detail)
                    ->update([
                        "sanksi_id" => $request->id_sanksi,
                        "tgl_pengajuan" => $request->tgl_pengajuan
                    ]);
                return redirect('/hasil')->with('success', 'sanki telah ditentukan');
            } else {
                return redirect('/hasil')->with('warning', 'sanki sudah  ditentukan!');
            }
        } elseif (session('jabatan') == 'Manager') {
            if (empty($cek2)) {

                DB::table('hasil')
                    ->where('hasil.id_detail', $request->id_deta)
                    ->update([
                        "status_pengajuan" => $request->approve,
                        "tgl_approve" => $request->tgl_approve
                    ]);
                return redirect('/hasil')->with('success', 'sanki telah disetujui');
            } else {
                return redirect('/hasil')->with('warning', 'sanki Sudah disetujui!');
            }
        }
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