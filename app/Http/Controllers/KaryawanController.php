<?php

namespace App\Http\Controllers;

use App\karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = karyawan::all();
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.tambah');
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
            'nik_karyawan' => 'required|unique:Karyawan|size:10',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_mulaikerja' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required|numeric|unique:Karyawan',
            'agama' => 'required',
            'departemen' => 'required',
            'foto' => 'required',
            'status_karyawan' => 'required',
            'no_telepon' => 'required||unique:Karyawan|size:12',
            'email' => 'required|email|unique:Karyawan'
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $karyawan = $request->file('foto')->getClientOriginalName();
            Karyawan::create([
                'nik_karyawan' => $request->nik_karyawan,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_mulaikerja' => $request->tanggal_mulaikerja,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'jabatan' => $request->jabatan,
                'npwp' => $request->npwp,
                'departemen' => $request->departemen,
                'status_karyawan' => $request->status_karyawan,
                'foto' => $karyawan,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email
            ]);
        }
        // Karyawan::create($request->all());


        return redirect('/Karyawan')->with('success', 'data karyawan berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {
        $data['karyawan'] = $karyawan;
        // dd($karyawan);
        return view('karyawan.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        $data['karyawan'] = $karyawan;
        // dd($karyawan);
        return view('karyawan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $karyawan = $request->file('foto')->getClientOriginalName();
            Karyawan::where('id', $request->id)
                ->update([
                    'nik_karyawan' => $request->nik_karyawan,
                    'nama_lengkap' => $request->nama_lengkap,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'tanggal_mulaikerja' => $request->tanggal_mulaikerja,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'agama' => $request->agama,
                    'jabatan' => $request->jabatan,
                    'npwp' => $request->npwp,
                    'departemen' => $request->departemen,
                    'status_karyawan' => $request->status_karyawan,
                    'foto' => $karyawan,
                    'no_telepon' => $request->no_telepon,
                    'email' => $request->email
                ]);
        } else {
            Karyawan::where('id', $request->id)
                ->update([
                    'nik_karyawan' => $request->nik_karyawan,
                    'nama_lengkap' => $request->nama_lengkap,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'tanggal_mulaikerja' => $request->tanggal_mulaikerja,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'agama' => $request->agama,
                    'jabatan' => $request->jabatan,
                    'npwp' => $request->npwp,
                    'departemen' => $request->departemen,
                    'status_karyawan' => $request->status_karyawan,
                    'no_telepon' => $request->no_telepon,
                    'email' => $request->email
                ]);
            // return redirect('/Karyawan')->with('success', 'data karyawan berhasil diUbah');
        }
        return redirect('/Karyawan')->with('success', 'data karyawan berhasil diUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $nik = $request->id;
        DB::table('karyawan')->where('nik_karyawan', $nik)->delete();
        return redirect('/Karyawan')->with('success', 'data berhasil di hapus');
    }
}