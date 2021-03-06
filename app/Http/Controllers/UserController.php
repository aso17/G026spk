<?php

namespace App\Http\Controllers;

use App\karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\session;
use App\user;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = DB::table('log_users')
            ->join('karyawan', 'karyawan.id', '=', 'log_users.karyawan_id')
            ->get();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tambah');
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
            'role' => 'required'
        ];

        $messages = [
            'nik_karyawan.required' => 'tidak boleh kosong!',
            'nik_karyawan.numeric' => 'harus 12 angka !',
            'nik_karyawan.min:12' => 'harus 12 angka !',
            'password.min:4' => 'harus lebih 4 karakter!',
            'password.required' => 'tidak boleh kosong!',
            'role.required' => 'tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $karyawan = DB::table('karyawan')
            ->where('nik_karyawan', $request->nik_karyawan)
            ->first();
        $id_karyawan = $karyawan->id;
        $user = new User;
        $user->karyawan_id = $id_karyawan;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'User telah ditambahkan');
            return redirect('/user');
        } else {
            Session::flash('errors', ['' => ' gagal! ']);
            return redirect('/user/tambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($karyawan_id)
    {
        $data['user'] = DB::table('log_users')
            ->join('karyawan', 'karyawan.id', '=', 'log_users.karyawan_id')
            ->where('log_users.karyawan_id', $karyawan_id)
            ->first();

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = [
            "password" => Hash::make($request->password),
            "role" => $request->role
        ];

        $update = DB::table('log_users')
            ->where('karyawan_id', $request->id)
            ->update($data);

        if ($update) {
            Session::flash('success', 'Update User berhasil');
            return redirect('/user');
        } else {
            Session::flash('errors', ['' => 'Update User!']);
            return redirect('/user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('log_users')->where('karyawan_id', '=', $request->id)->delete();

        return redirect('/user')->with('info', 'User telah dihapus');
    }
}