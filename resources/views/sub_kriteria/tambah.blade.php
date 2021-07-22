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
                                <h5 class=""><i class="fas fa-edit ml-2">Form Tambah Sub Kriteria</i></h5>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/subkriteria" enctype="">
                                @csrf
                                <div class="card-body">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id_kriteria" value="{{ $kriteria->id }}">
                                            <label for="kode_kriteria">Kode kriteria
                                                {{ $kriteria->nama_kriteria }}</label>
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
                                    <div class="card-footer mt-3">
                                        <a href="{{ url('/Sub_kriteria/' . $kriteria->id) }}"><button
                                                class="btn cancel btn btn-sm float-right text-light" type="button"><i
                                                    class="fas fa-arrow-circle-left"></i>
                                                Cancel</button></a>
                                        <button class=" btn tambah btn btn-sm float-right mr-3 " type="submit"
                                            name="submit"><i class="far fa-paper-plane"></i> Create</button>

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
