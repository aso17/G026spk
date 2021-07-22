@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class=""><i class="fas fa-tag"></i> Form
                            Create User log </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">
                                    <div class="info-box-content">

                                        <form method="post" action="/user/tambah" enctype="">
                                            @csrf
                                            <div class="card-body">


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="">
                                                            <div
                                                                class="pl-2  rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">

                                                                <div class="form-group">

                                                                    <label for="nik_karyawan">Cari Nik
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
                                                            <label for="role">Role</label>
                                                            <select name="role"
                                                                class="form-control @error('role') is-invalid @enderror "
                                                                id="role" name="role" value="<">
                                                                <option value="{{ old('role') }}" hidden>--
                                                                    pilih--
                                                                </option>
                                                                <option value="1" {{ @old('role') }}>
                                                                    Manager
                                                                </option>
                                                                <option value="2" {{ @old('role') }}>
                                                                    Supervisor
                                                                </option>
                                                                <option value="3" {{ @old('role') }}>
                                                                    Admimistrator
                                                                </option>
                                                            </select>
                                                            @error('role')

                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row ">
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="ml-3" for="nama_karyawan">nama Lengkap
                                                            </label>
                                                            <input type="text" class="form-control  " id="nama_karyawan"
                                                                name="nama_karyawan" value="" readonly>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="ml-3" for="password">Password
                                                            </label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror  "
                                                                id="password" name="password" value="">
                                                            @error('password')
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
                                                            <label class="ml-3" for="status_karyawan">jabatan
                                                            </label>
                                                            <input type="text" class="form-control  " id="jabatan"
                                                                name="status_karyawan" value="" readonly>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="ml-3" for="departemen">Departemen</label>
                                                            <input type="text" class="form-control  " id="departemen"
                                                                name="departemen" value="" readonly>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ url('/user') }}"><button
                                                    class="btn cancel btn btn-sm float-right text-light" type="button"><i
                                                        class="fas fa-arrow-circle-left"></i>
                                                    Cancel</button></a>
                                            <button class=" btn tambah btn btn-sm float-right mr-3 " type="submit"
                                                name="submit"><i class="far fa-paper-plane"></i> Create</button>

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
    <script type="text/javascript">
        function ketik() {
            var nik_karyawan = $("#nik_karyawan").val();
            $.ajax({

                url: "{{ url('') }}/cari",
                data: "nik_karyawan=" + nik_karyawan,
                success: function(data) {
                    var json = data;
                    obj = JSON.parse(json);
                    $('#id_karyawan').val(obj.id);
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
