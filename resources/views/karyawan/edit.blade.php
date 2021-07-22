@extends('layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="bg-danger"><i class="fas fa-tag"> </i> Form Edit karyawan</h5>
                    <div class="card card-warning card-outline ">

                        <div class="card-body box-profile">

                            <div class="col-lg-5 d-flex py-3">
                                <img class="profile-user-img img-fluid " style="width: 200px; height:200px;"
                                    src="{{ asset('foto/' . $karyawan->foto) }}" alt="User profile picture">
                            </div>

                        </div>


                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12" style="overflow: initial">
                <!-- general form elements -->
                <div class="card card- text-dark">

                    <form method="post" action="/karyawan" enctype="multipart/form-data">
                        <!-- /.card-header -->
                        <!-- form start -->
                        @csrf
                        @method('patch')

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $karyawan->id }}">

                                        <label for="nik_karyawan">Nik Karyawan</label>
                                        <input type="text" class="form-control @error('nik_karyawan') is-invalid @enderror "
                                            id="nik_karyawan" name="nik_karyawan" value="{{ $karyawan->nik_karyawan }}"
                                            autocomplete="off">
                                        @error('nik_karyawan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror "
                                            id="tempat_lahir" name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}"
                                            autocomplete="off">
                                        @error('tempat_lahir')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror "
                                            id="nama_lengkap" name="nama_lengkap" value="{{ $karyawan->nama_lengkap }}"
                                            autocomplete="off">
                                        @error('nama_lengkap')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror "
                                            id="tanggal_lahir" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}"
                                            autocomplete="off">
                                        @error('tanggal_lahir')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror "
                                            id="jenis_kelamin" name="jenis_kelamin"
                                            value="{{ $karyawan->jenis_kelamin }}">
                                            <option value="{{ $karyawan->jenis_kelamin }}" hidden>-- Jenis Kelamin --
                                            </option>
                                            <option value="laki-laki"
                                                {{ @old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-Laki
                                            </option>
                                            <option value="perempuan"
                                                {{ @old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_karyawan">Status Karyawan</label>
                                        <select name="status_karyawan"
                                            class="form-control @error('status_karyawan') is-invalid @enderror "
                                            id="status_karyawan" value=" {{ $karyawan->status_karyawan }}">
                                            <option value="{{ $karyawan->status_karyawan }}" hidden>-- Status
                                                Karyawan --
                                            </option>
                                            <option value="tetap"
                                                {{ @old('status_karyawan') == 'tetap' ? 'selected' : '' }}>
                                                Tetap</option>
                                            <option value="kontrak"
                                                {{ @old('status_karyawan') == 'kontrak' ? 'selected' : '' }}>
                                                Kontrak
                                            </option>
                                        </select>
                                        @error('status_karyawan')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" class="form-control @error('agama') is-invalid @enderror "
                                            id="agama" value="{{ $karyawan->agama }}">
                                            <option value="{{ $karyawan->agama }}" hidden>-- Pilih --
                                            </option>
                                            <option value="islam" {{ @old('agama') == 'islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="kristen" {{ @old('agama') == 'kristen' ? 'selected' : '' }}>
                                                Kristen
                                            </option>

                                            <option value="Hindu" {{ @old('agama') == 'hindu' ? 'selected' : '' }}>
                                                Hindu
                                            </option>
                                            <option value="budha" {{ @old('agama') == 'budha' ? 'selected' : '' }}>
                                                Budha
                                            </option>
                                            <option value="konghuchu" {{ @old('agama') == 'budha' ? 'selected' : '' }}>
                                                Konghucu
                                            </option>
                                        </select>
                                        @error('agama')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="departemen">Departemen</label>
                                        <input type="text" class="form-control @error('departemen') is-invalid @enderror "
                                            id="departemen" name="departemen" value="{{ $karyawan->departemen }}"
                                            autocomplete="off">
                                        @error('departemen')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>

                                        <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror "
                                            id="jabatan" value="{{ $karyawan->jabatan }}">
                                            <option value="{{ $karyawan->jabatan }}" hidden>-- Pilih --
                                            </option>
                                            <option value="manager" {{ @old('jabatan') == 'spv' ? 'selected' : '' }}>
                                                Manager</option>
                                            <option value="spv" {{ @old('jabatan') == 'manager' ? 'selected' : '' }}>
                                                Supervisor</option>
                                            <option value="officer" {{ @old('jabatan') == 'officer' ? 'selected' : '' }}>
                                                Officer
                                            </option>

                                            <option value="checker" {{ @old('jabatan') == 'checker' ? 'selected' : '' }}>
                                                Checker
                                            </option>
                                            <option value="admin" {{ @old('jabatan') == 'admin' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="helper" {{ @old('jabatan') == 'helper' ? 'selected' : '' }}>
                                                Helper
                                            </option>
                                        </select>
                                        @error('jabatan')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control @error('npwp') is-invalid @enderror "
                                            id="npwp" name="npwp" value="{{ $karyawan->npwp }}" autocomplete="off">
                                        @error('npwp')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_mulaikerja">Tanggal mulai bekerja</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_mulaikerja') is-invalid @enderror "
                                            id="tanggal_mulaikerja" name="tanggal_mulaikerja"
                                            value="{{ $karyawan->tanggal_mulaikerja }}">
                                        @error('tanggal_mulaikerja')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="no_telepon">Telepon</label>
                                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror "
                                            id="no_telepon" name="no_telepon" value="{{ $karyawan->no_telepon }}"
                                            autocomplete="off">
                                        @error('no_telepon')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="foto" value="{{ $karyawan->foto }}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror "
                                            id="email" name="email" value="{{ $karyawan->email }}" autocomplete="off">
                                        @error('email')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="/Karyawan" class="btn btn-warning btn-icon-split btn-sm float-right"
                                style="margin-bottom: 5px;"><span class="icon text-white-5">
                                    <i class="fas fa-arrow-circle-left"></i></span>
                                <span class="font-weight-bold text-danger">Cancel</span></a>

                            <div class="button-container ">
                                <button type="submit" class="button " id="submit" onclick="validation()"><span
                                        class="icon text-white-5 "><i class="far fa-paper-plane"></i>
                                        Update </span></button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- /.content -->


    <!-- /.content-wrapper -->
    {{-- modal hapus --}}

@endsection
