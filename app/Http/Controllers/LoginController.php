<?php

namespace App\Http\Controllers;

use App\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\session;
use App\user;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
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

        $rules = [
            'nik_karyawan' => 'required|min:12|numeric',
            'password' => 'required|min:4',

        ];

        $messages = [
            'nik_karyawan.required' => 'tidak boleh kosong!',
            'nik_karyawan.numeric' => 'harus 12 angka !',
            'nik_karyawan.min:12' => 'harus 12 angka !',
            'password.min:4' => 'harus lebih 4 karakter!',
            'password.required' => 'tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }



        $karyawan = DB::table('karyawan')->where('nik_karyawan', $request->nik_karyawan)->first();
        $id_karyawan = $karyawan->id;
        $user = DB::table('log_users')
            ->join('karyawan', 'karyawan.id', '=', 'log_users.karyawan_id')
            ->where('karyawan_id', $id_karyawan)
            ->first();
        // dd($user);
        if ($user !== null) {
            if (Hash::check($request->password, $user->password)) {
                session([
                    "login" => true,
                    "Username" => $user->nama_lengkap,
                    "nik_karyawan" => $user->nik_karyawan,
                    "role" => $user->role,
                    "jabatan" => $user->jabatan
                ]);
                return redirect('/Dashboard');
            } else {

                return redirect('/')->with('warning', 'password wrong!');
            }
        } else {
            return redirect('/')->with('warning', 'user not found!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(login $login)
    {
        //
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}