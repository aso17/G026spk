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
    public function ubah(Request $request)
    {
        DB::table('ketentuan_sanksi')
            ->where('id', $request->id_sanksi)
            ->update([
                "nama_sanksi" => $request->namasanksi,
                "nilai_ketentuan" => $request->nilaiketentuan
            ]);
        return redirect('/hasil')->with('success', 'data Sanksi berhasil diUbah');
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
            ->where('hasil.karyawan_id', $request->id_kar)
            ->first();
        $cek2 = DB::table('hasil')
            ->where('hasil.karyawan_id', $request->idkar)
            ->first();

        if (session('role') == 2) {
            if ($cek1->sanksi_id == null) {
                DB::table('hasil')
                    ->where('hasil.karyawan_id', $request->id_kar)
                    ->update([
                        "sanksi_id" => $request->id_sanksi,
                        "tgl_pengajuan" => $request->tgl_pengajuan
                    ]);
                //menghapus data normalisasi
                DB::table('normalisasi')->where('id_karyawan', $request->id_kar)->delete();

                return redirect('/hasil')->with('success', 'sanki telah ditentukan');
            } else {
                return redirect('/hasil')->with('warning', 'sanki sudah  ditentukan!');
            }
        } elseif (session('role') == 1) {
            if ($cek2->tgl_approve == null) {
                DB::table('hasil')
                    ->where('hasil.karyawan_id', $request->idkar)
                    ->update([
                        "status_pengajuan" => $request->approve,
                        "tgl_approve" => $request->tgl_approve
                    ]);
                // hapus tabel normalisasi
                DB::table('normalisasi')->where('id_karyawan', '=', $request->idkar)->delete();
                return redirect('/hasil')->with('success', 'sanki telah disetujui');
            } else {
                return redirect('/hasil')->with('warning', 'sanki Sudah disetujui!');
            }
        } elseif (session('role') == 3) {

            DB::table('hasil')
                ->where('hasil.karyawan_id', $request->id_kar)
                ->update([
                    "sanksi_id" => $request->id_sanksi,
                    "tgl_pengajuan" => $request->tgl_pengajuan
                ]);
            // DB::table('normalisasi')->where('id_karyawan', $request->id_kar)->delete();


            DB::table('hasil')
                ->where('hasil.karyawan_id', $request->idkar)
                ->update([
                    "status_pengajuan" => $request->approve,
                    "tgl_approve" => $request->tgl_approve
                ]);

            return redirect('/hasil')->with('success', 'perubahan data berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('ketentuan_sanksi')->where('id', $request->idsanksi)->delete();
        return redirect('/hasil')->with('success', 'data berhasil dihapus');
    }
}