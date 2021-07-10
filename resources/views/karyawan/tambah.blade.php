@extends('layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12" style="overflow: initial">
                        <!-- general form elements -->
                        <div class="card card-">
                            <div class="card-header">
                                <h5 class="bg-danger"><i class="fas fa-edit ml-2"></i> Form Tambah Data Karyawan</h5>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/karyawan" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="nik_karyawan">Nik Karyawan</label>
                                                <input type="text"
                                                    class="form-control @error('nik_karyawan') is-invalid @enderror "
                                                    id="nik_karyawan" name="nik_karyawan"
                                                    value="{{ old('nik_karyawan') }}" autocomplete="off">

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
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror "
                                                    id="tempat_lahir" name="tempat_lahir"
                                                    value="{{ old('tempat_lahir') }}" autocomplete="off">
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
                                                <input type="text"
                                                    class="form-control @error('nama_lengkap') is-invalid @enderror "
                                                    id="nama_lengkap" name="nama_lengkap"
                                                    value="{{ old('nama_lengkap') }}" autocomplete="off">
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
                                                    id="tanggal_lahir" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir') }}" autocomplete="off">
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
                                                    id="jenis_kelamin" name="jenis_kelamin" value="<">
                                                    <option value="{{ old('jenis_kelamin') }}" hidden>-- Jenis Kelamin --
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
                                                    id="status_karyawan" value="<">
                                                    <option value="{{ old('status_karyawan') }}" hidden>-- Status
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
                                                <select name="agama"
                                                    class="form-control @error('agama') is-invalid @enderror " id="agama"
                                                    value="<">
                                                    <option value="{{ old('agama') }}" hidden>-- Pilih --
                                                    </option>
                                                    <option value="islam"
                                                        {{ @old('agama') == 'islam' ? 'selected' : '' }}>
                                                        Islam</option>
                                                    <option value="kristen"
                                                        {{ @old('agama') == 'kristen' ? 'selected' : '' }}>
                                                        Kristen
                                                    </option>

                                                    <option value="Hindu"
                                                        {{ @old('agama') == 'hindu' ? 'selected' : '' }}>
                                                        Hindu
                                                    </option>
                                                    <option value="budha"
                                                        {{ @old('agama') == 'budha' ? 'selected' : '' }}>
                                                        Budha
                                                    </option>
                                                    <option value="konghuchu"
                                                        {{ @old('agama') == 'budha' ? 'selected' : '' }}>
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
                                                <input type="text"
                                                    class="form-control @error('departemen') is-invalid @enderror "
                                                    id="departemen" name="departemen" value="{{ old('departemen') }}"
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

                                                <select name="jabatan"
                                                    class="form-control @error('jabatan') is-invalid @enderror "
                                                    id="jabatan" value="">
                                                    <option value="{{ old('jabatan') }}" hidden>-- Pilih --
                                                    </option>
                                                    <option value="manager"
                                                        {{ @old('jabatan') == 'spv' ? 'selected' : '' }}>
                                                        Manager</option>
                                                    <option value="spv"
                                                        {{ @old('jabatan') == 'manager' ? 'selected' : '' }}>
                                                        Supervisor</option>
                                                    <option value="officer"
                                                        {{ @old('jabatan') == 'officer' ? 'selected' : '' }}>
                                                        Officer
                                                    </option>

                                                    <option value="checker"
                                                        {{ @old('jabatan') == 'checker' ? 'selected' : '' }}>
                                                        Checker
                                                    </option>
                                                    <option value="admin"
                                                        {{ @old('jabatan') == 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                    <option value="helper"
                                                        {{ @old('jabatan') == 'helper' ? 'selected' : '' }}>
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
                                                    id="npwp" name="npwp" value="{{ old('npwp') }}" autocomplete="off">
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
                                                    value="{{ old('tanggal_mulaikerja') }}">
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
                                                <input type="text"
                                                    class="form-control @error('no_telepon') is-invalid @enderror "
                                                    id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}"
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
                                                            name="foto" value="{{ @old('foto') }}">
                                                        <label class="custom-file-label"
                                                            for="exampleInputFile">Choose</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror " id="email"
                                                    name="email" value="{{ old('email') }}" autocomplete="off">
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
                                                Save </span></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
