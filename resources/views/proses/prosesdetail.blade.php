@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i>Proses</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i> Form
                                            proses Kriteria {{ $kriteria->nama_kriteria }}</h5>
                                        <span class="info-box-text text-right font-weight-bold text-danger mr-3">type :
                                            {{ $kriteria->type }}</span>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" action="/proses/tambah" enctype="">
                                                    @csrf
                                                    <div class="card-body">
                                                        <input type="hidden" id="idkriteria" name="idkriteria"
                                                            value="{{ $kriteria->id }}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <div
                                                                        class="pl-2  rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">

                                                                        <div class="form-group">

                                                                            <label for="nik_karyawan">Ketikan Nik
                                                                                karyawan</label>
                                                                            <input type="text"
                                                                                class="form-control @error('nik_karyawan') is-invalid @enderror "
                                                                                id="nik_karyawan" name="nik_karyawan"
                                                                                value="{{ old('nik_karyawan') }}">

                                                                            @error('nik_karyawan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>Sub kriteria
                                                                            {{ $kriteria->nama_kriteria }}</label>
                                                                        <select class="form-control" name="subkriteria">
                                                                            <option hidden>pilih</option>
                                                                            @foreach ($subkriteria as $sub)
                                                                                <option value="{{ $sub->id }}">
                                                                                    {{ $sub->sub_kriteria }}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nama_karyawan">nama karyawan </label>
                                                                    <input type="text" class="form-control  "
                                                                        id="nama_karyawan" name="nama_karyawan" value=""
                                                                        readonly>

                                                                </div>
                                                            </div>


                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="status_karyawan">Status karyawan</label>
                                                                    <input type="text" class="form-control  "
                                                                        id="status_karyawan" name="status_karyawan" value=""
                                                                        readonly>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="departemen">Departemen</label>
                                                                    <input type="text" class="form-control  "
                                                                        id="departemen" name="departemen" value="" readonly>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class=" btn btn-primary float-right "
                                                        type="submit">Submit</button>
                                            </div>






                                            <!-- /.card-body -->


                                            </form>

                                        </div>

                                    </div>
                                </div>
                                <!-- /.info-box-content -->

                            </div>




                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
