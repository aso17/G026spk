@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Daftar Kriteria</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i>Alternatif</h5>
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"></span>
                                        <div class="row">
                                            <div class="col">

                                                <button class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="fas fa-plus-circle"></i></button>
                                            </div>
                                        </div>
                                        <table class="table  table table-hover table-responsive-sm">
                                            <thead>

                                            </thead>
                                            <tbody>
                                                @foreach ($alternatif as $alter)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>{{ $alter->nama_alternatif }}</td>

                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="/alternatiif/{{ $alter->id }}"
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
                                <h5 class="bg-warning"><i class="fas fa-tag"></i> Kriteria perhitungan</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm" id="kriteria">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>kode</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Bobot kriteria</th>
                                                    <th>Type</th>

                                                    <th style="width: 30%" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($kriteria as $krite)


                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td> {{ $krite->kode_kriteria }} </td>
                                                        <td>{{ $krite->nama_kriteria }}</td>
                                                        <td>{{ $krite->bobot }}</td>
                                                        <td>{{ $krite->type }}</td>

                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="/kriteria/{{ $krite->id }}"
                                                                class="btn edit btn-sm mr-3 float-right text-light"
                                                                id="ubah"><i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="/Sub_kriteria/{{ $krite->id }}"
                                                                class="btn detail btn btn-sm mr-3 text-light float-right "
                                                                id="sub_kriteria">
                                                                Sub kriteria
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ '/alternatif' }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Alternatif</label>
                            <input type="text" class="form-control  @error('nama_alternatif') is-invalid @enderror"
                                id="nama_alternatif" name="nama_alternatif">
                            @error('nama_alternatif')

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
