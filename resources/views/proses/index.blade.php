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
                                                        @foreach ($alternatif as $alter)
                                                            <div class="col-md-3">

                                                                <ul class="list-group ">

                                                                    <li
                                                                        class="list-group-item d-flex justify-content-center">
                                                                        <a
                                                                            href="{{ url('/detailproses/' . $alter->id) }}">
                                                                            <button
                                                                                class="btn nilai btn btn-default text-light"
                                                                                type="button"><i
                                                                                    class="fas fa-location-arrow mr-1">
                                                                                </i>{{ $alter->nama_alternatif }}</button></a>

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
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Tabel Normalisasi</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="proses">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Alternatif</th>
                                                    <th>C1</th>
                                                    <th>C3</th>
                                                    <th>C3</th>


                                                    <th style="width: 20%" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($normalisasi as $norma)

                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>{{ $norma->nama_lengkap }}</td>
                                                        <td>{{ $norma->nama_alternatif }} </td>
                                                        <td>{{ $norma->C1 }} </td>
                                                        <td>{{ $norma->C1 }} </td>
                                                        <td>{{ $norma->C1 }} </td>



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

                                                        </td>
                                                    </tr>
                                                @endforeach





                                            </tbody>
                                        </table>
                                        @foreach ($idkaryawan as $id)
                                            @if ('{{ $idkaryawan->id !== null }}')

                                                <a href="{{ '/proses/nilai/' . $id->id_karyawan }}"> <button
                                                        class="btn tambah btn- float-right mt-3"><i
                                                            class="fab fa-accusoft"></i>
                                                        Proses
                                                        Penilain</button></a>
                                            @else
                                                null

                                            @endif

                                        @endforeach


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
