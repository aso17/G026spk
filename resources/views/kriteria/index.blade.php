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
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i> Memorandum</h5>
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"></span>
                                        <table class="table  table table-hover table-responsive-sm">
                                            <thead>

                                                <tr>
                                                    <th>#</th>
                                                    <th>Nilai Ketentuan</th>
                                                    <th>keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>0>=5</td>
                                                    <td>Teguran lisan</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>0>=5</td>
                                                    <td>Surat Teguran</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>0>=5</td>
                                                    <td>Surat Peringatan</td>
                                                </tr>
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
@endsection
