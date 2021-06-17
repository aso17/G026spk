@extends('layout.index')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8" style="overflow: initial">
                        <!-- general form elements -->
                        <div class="card card-">
                            <div class="card-header">
                                <h5 class="bg-danger"><i class="fas fa-edit ml-2">Form Tambah Data Kriteria</i></h5>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/kriteria" enctype="">
                                @csrf
                                <div class="card-body">


                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="kode_kriteria">Kode kriteria</label>
                                            <input type="text"
                                                class="form-control @error('kode_kriteria') is-invalid @enderror "
                                                id="kode_kriteria" name="kode_kriteria"
                                                value="{{ old('kode_kriteria') }}">

                                            @error('kode_kriteria')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="nama_kriteria">Nama Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('nama_kriteria') is-invalid @enderror "
                                                id="nama_kriteria" name="nama_kriteria"
                                                value="{{ old('nama_kriteria') }}">
                                            @error('nama_kriteria')

                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="bobot">Bobot Kriteria</label>
                                            <input type="text" class="form-control @error('bobot') is-invalid @enderror "
                                                id="bobot" name="bobot" value="{{ old('bobot') }}">
                                            @error('bobot')

                                                <div class=" invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control @error('type') is-invalid @enderror "
                                                id="type" name="type" value="<">
                                                <option value="{{ old('type') }}" hidden>-- pilih--
                                                </option>
                                                <option value="cost" {{ @old('type') == 'cost' ? 'selected' : '' }}>
                                                    cost
                                                </option>
                                                <option value="Banefit" {{ @old('type') == 'Banefit' ? 'selected' : '' }}>
                                                    Banefit
                                                </option>
                                            </select>
                                            @error('type')

                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer mt-3">
                                    <a href="/kriteria" class="btn btn-warning btn-icon-split btn-sm float-right"
                                        style="margin-bottom: 5px;"><span class="icon text-white-5">
                                            <i class="fas fa-arrow-circle-left"></i></span>
                                        <span class="font-weight-bold text-danger">Cancel</span></a>

                                    <div class="button-container float-left ">
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
