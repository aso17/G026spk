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
                                                                                value="{{ old('nik_karyawan') }}"
                                                                                onkeyup="ketik()">

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
                                                            <div class="col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label class="ml-3" for="nama_karyawan">nama karyawan
                                                                    </label>
                                                                    <input type="text" class="form-control  "
                                                                        id="nama_karyawan" name="nama_karyawan" value=""
                                                                        readonly>

                                                                </div>
                                                            </div>


                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="ml-3" for="status_karyawan">Status
                                                                        karyawan</label>
                                                                    <input type="text" class="form-control  "
                                                                        id="status_karyawan" name="status_karyawan" value=""
                                                                        readonly>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="ml-3" for="departemen">Departemen</label>
                                                                    <input type="text" class="form-control  "
                                                                        id="departemen" name="departemen" value="" readonly>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('/proses') }}"><button
                                                            class="btn cancel btn btn-sm float-right text-light"
                                                            type="button">Cancel</button></a>
                                                    <button class=" btn tambah btn btn-sm  " type="submit">Tambah</button>

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
    <script type="text/javascript">
        function ketik() {
            var nik_karyawan = $("#nik_karyawan").val();
            $.ajax({

                url: "{{ url('') }}/cari",
                data: "nik_karyawan=" + nik_karyawan,
                success: function(data) {
                    var json = data;
                    obj = JSON.parse(json);
                    $('#nik_karyawan').val(obj.nik_karyawan);
                    $('#nama_karyawan').val(obj.nama_lengkap);
                    $('#status_karyawan').val(obj.status_karyawan);
                    $('#departemen').val(obj.departemen);
                    $('#jabatan').val(obj.jabatan);


                }

            });
        }

    </script>
@endsection
