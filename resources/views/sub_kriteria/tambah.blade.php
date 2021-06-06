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
                                <h5 class="bg-danger"><i class="fas fa-edit ml-2">Form Tambah Sub Kriteria</i></h5>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/subkriteria" enctype="">
                                @csrf
                                <div class="card-body">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id_kriteria" value="{{ $kriteria->id }}">
                                            <label for="kode_kriteria">Kode kriteria {{ $kriteria->nama_kriteria }}</label>
                                            <input type="text"
                                                class="form-control @error('kode_kriteria') is-invalid @enderror "
                                                id="kode_kriteria" name="kode_kriteria"
                                                value="{{ $kriteria->kode_kriteria }}" disabled>


                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sub_kriteria">Nama sub Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('sub_kriteria') is-invalid @enderror "
                                                id="sub_kriteria" name="sub_kriteria" value="{{ old('sub_kriteria') }}">
                                            @error('sub_kriteria')

                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="bobot_subkriteria">Bobot Sub Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('bobot_subkriteria') is-invalid @enderror "
                                                id="bobot_subkriteria" name="bobot_subkriteria"
                                                value="{{ old('bobot_subkriteria') }}">
                                            @error('bobot_subkriteria')

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
