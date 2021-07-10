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
                                <h5 class="bg-danger"><i class="fas fa-edit ml-2">Form ubah Sub Kriteria</i></h5>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/subkriteria/{{ $subkriteria->id }}" enctype="">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <input type="hidden" name="id_krteria" value="{{ $subkriteria->id_kriteria }}">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sub_kriteria">Nama sub Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('sub_kriteria') is-invalid @enderror "
                                                id="sub_kriteria" name="sub_kriteria"
                                                value="{{ $subkriteria->sub_kriteria }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="bobot_subkriteria">Bobot Sub Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('bobot_subkriteria') is-invalid @enderror "
                                                id="bobot_subkriteria" name="bobot_subkriteria"
                                                value="{{ $subkriteria->bobot_subkriteria }}">

                                        </div>
                                    </div>


                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer mt-3">
                                    <div class="card-footer mt-3">
                                        <a href="{{ url('/Sub_kriteria/' . $subkriteria->id_kriteria) }}"><button
                                                class="btn cancel btn btn-sm float-right text-light" type="button"><i
                                                    class="fas fa-arrow-circle-left"></i>
                                                Cancel</button></a>
                                        <button class=" btn tambah btn btn-sm float-right mr-3 " type="submit"
                                            name="submit"><i class="far fa-paper-plane"></i> Update</button>

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
