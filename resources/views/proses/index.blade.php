@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Proses</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i> Proses Penilain</h5>
                                        <div class="row">
                                            <div class="col-md-12">


                                                <div class="card-body">
                                                    <input type="hidden" id="id" value="">
                                                    <div class="row">
                                                        @foreach ($kriteria as $krite)
                                                            <div class="col-md-3">

                                                                <ul class="list-group ">

                                                                    <li
                                                                        class="list-group-item d-flex justify-content-center">
                                                                        <a href="{{ url('/proses/' . $krite->id) }}">
                                                                            <button class="btn btn-default text-primary"
                                                                                type="button">{{ $krite->nama_kriteria }}</button></a>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <!-- /.card-body -->



                                    </div>
                                </div>
                                <!-- /.info-box-content -->

                            </div>




                        </div>


                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i> Daftar Pelanggaran Karyawan</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm" id="proses">
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




                                                <tr>
                                                    <td></td>
                                                    <td> </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td class="justify-content-center">
                                                        <button class="btn hap btn btn-sm mr-3 float-right" id="hapus"
                                                            data-toggle="modal" data-target="#deletemodal"
                                                            data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            Delete</button>
                                                        <a href="" class="btn fourth btn-sm mr-3 float-right" id="ubah"><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <a href="" class="btn det btn btn-sm mr-3 text-dark float-right "
                                                            id="sub_kriteria"><i class="fas fa-eye"></i>
                                                            Detail
                                                        </a>

                                                    </td>
                                                </tr>




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
