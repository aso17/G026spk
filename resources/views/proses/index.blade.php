@extends('layout.index')
@section('content')

    <div class="container-fluid bg-primary">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Proses</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i>Nilai Ketentuan Sanksi</h5>
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"></span>
                                        <div class="row">
                                            <div class="col">

                                                <button class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="fas fa-plus-circle"></i></button>
                                            </div>
                                        </div>
                                        <table class="table  table table-hover table-responsive-sm text-dark">
                                            <thead>
                                                <th>#</th>
                                                <th>nama sanksi</th>
                                                <th>Niali Ketentuan sanksi</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($ketentuan as $kte)


                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kte->nama_sanksi }}</td>
                                                        <td style="widht">{{ $kte->nilai_ketentuan }}</td>

                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="/sanksi/"
                                                                class="btn edit btn-sm mr-2 float-right text-light"
                                                                id="ubah"><i class="fas fa-edit"></i>
                                                            </a>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.info-box-content -->

                                </div>




                            </div>
                        </div>


                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Daftar Proses</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="proses">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nik karyawan</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>bobot C2</th>
                                                    <th>bobot C2</th>
                                                    <th>bobot C3</th>



                                                    <th style="width: 20%" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detail as $d)



                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->nik_karyawan }}</td>
                                                        <td>{{ $d->nama_lengkap }}</td>
                                                        <td>{{ $d->bobot_c1 }} </td>
                                                        <td>{{ $d->bobot_c2 }} </td>
                                                        <td> {{ $d->bobot_c3 }}</td>




                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-1 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="" class="btn edit btn-sm mr-3 float-right text-light"
                                                                id="ubah"><i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn detail btn btn-sm mr-3  float-right text-light"
                                                                id="sub_kriteria"><i class="fas fa-eye"></i>

                                                            </a>
                                                            <a href="{{ 'proses/hitung/' . $d->id_karyawan }}"
                                                                class="btn detail btn btn-sm mr-3  float-right text-light"
                                                                id="proses"><i class="fas fa-ey">Proses</i>

                                                            </a>

                                                        </td>
                                                    </tr>

                                                @endforeach



                                            </tbody>
                                        </table>


                                        {{-- <a href="{{ '/proses/nilai/' }}"> <button
                                                class="btn tambah btn- float-right mt-3"><i class="fab fa-accusoft"></i>
                                                Proses
                                                Penilain</button></a> --}}





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //modalbox --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Alternatif sanki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ '/sanksi' }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Sanksi</label>
                            <input type="text" class="form-control  @error('nama_sanksi') is-invalid @enderror"
                                id="nama_sanksi" name="nama_sanksi">
                            @error('nama_sanksi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nilai Ketentuan</label>
                            <input type="text" class="form-control  @error('nilai_ketentuan') is-invalid @enderror"
                                id="nilai_ketentuan" name="nilai_ketentuan">
                            @error('nilai_ketentuan')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
