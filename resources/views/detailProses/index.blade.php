@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class=""><i class="fas fa-square-root-alt"></i> Proses Penilaian Karyawan</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">



                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="info-box-text text-right font-weight-bold  mr-3"></span>
                                                <form method="post" action="/detailproses/tambah" enctype="" name="form1"
                                                    id="form1">
                                                    @csrf
                                                    <div class="card-body">
                                                        <input type="hidden" id="id_karyawan" name="id_karyawan">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="">
                                                                    <div
                                                                        class="pl-2  rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">

                                                                        <div class="form-group">

                                                                            <label for="nik_karyawan">Ketiaknan Nik
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
                                                                        <label>Kriteria
                                                                        </label>
                                                                        <select
                                                                            class="form-control @error('idkriteria') is-invalid @enderror "
                                                                            name="idkriteria" id="idkriteria">
                                                                            <option selected hidden value="">-- pilih --
                                                                            </option>
                                                                            @foreach ($kriteria as $krite)

                                                                                <option value="{{ $krite->id }}">
                                                                                    {{ $krite->nama_kriteria }}
                                                                                </option>
                                                                            @endforeach

                                                                        </select>
                                                                        @error('idkriteria')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
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
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>Sub Kriteria
                                                                        </label>
                                                                        <select
                                                                            class="form-control @error('idsubkriteria') is-invalid @enderror "
                                                                            name="idsubkriteria" id="idsubkriteria">



                                                                        </select>
                                                                        @error('idsubkriteria')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


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

                                                            <div class="col-md-6">
                                                                <span id="type">
                                                                </span>
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
                                                            type="button"><i class="fas fa-arrow-circle-left"></i>
                                                            Cancel</button></a>
                                                    <button class=" btn tambah btn btn-sm float-right mr-2   " type="submit"
                                                        name="submit" value="submit"> <i class="far fa-paper-plane"></i>
                                                        Create</button>

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
        $(document).ready(function() {
            $('#idkriteria').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('') }}/pilih",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(sub) {

                        $('#idsubkriteria').html(sub);



                    }

                });

            });
            $('#idkriteria').change(function() {
                var id_kriteria = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('') }}/type",
                    data: {
                        id: id_kriteria
                    },
                    dataType: "JSON",
                    success: function(response) {

                        $('#type').html(response);



                    }

                });

            });

        });




        function ketik() {
            var nik_karyawan = $("#nik_karyawan").val();
            $.ajax({

                url: "{{ url('') }}/cari",
                data: "nik_karyawan=" + nik_karyawan,
                success: function(data) {
                    var json = data;
                    obj = JSON.parse(json);
                    $('#id_karyawan').val(obj.id_karyawan);
                    $('#nik_karyawan').val(obj.nik_karyawan);
                    $('#nama_karyawan').val(obj.nama_lengkap);
                    $('#status_karyawan').val(obj.status_karyawan);
                    $('#departemen').val(obj.departemen);
                    $('#jabatan').val(obj.jabatan);


                }

            });
        }
    </script>
    <script>


    </script>
@endsection
