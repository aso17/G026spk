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
                            <div class="col-md-7">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class="bg-primary"><i class="fas fa-tag"></i> Form proses </h5>
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"></span>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" action="/proses/tambah" enctype="">
                                                    @csrf
                                                    <div class="card-body">
                                                        <input type="hidden" id="id" value="">
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

                                                                    <label for="c1">Absensi (C1)</label>
                                                                    <input type="hidden" class="form-control " id="c1"
                                                                        name="c1" value="{{ old('c1') }}">

                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio"
                                                                                id="customRadio2" name="c3">
                                                                            <label for="customRadio2"
                                                                                class="custom-control-label">Custom
                                                                                Radio</label>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nama_karyawan">nama karyawan </label>
                                                                    <input type="text" class="form-control  "
                                                                        id="nama_karyawan" name="nama_karyawan" value=""
                                                                        readonly>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="c2">Kooperatif (C2)</label>
                                                                    <input type="hidden" class="form-control " id="c2"
                                                                        name="c2" value="{{ old('c2') }}">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio"
                                                                                id="customRadio2" name="c2">
                                                                            <label for="customRadio2"
                                                                                class="custom-control-label">Custom
                                                                                Radio</label>
                                                                        </div>


                                                                    </div>

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
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="c3">Etika Kerja (C3)</label>
                                                                    <input type="hidden" class="form-control " id="c3"
                                                                        name="c3" value="{{ old('c3') }}">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio"
                                                                                id="customRadio3" name="c3">
                                                                            <label for="customRadio3"
                                                                                class="custom-control-label">Custom
                                                                                Radio</label>
                                                                        </div>


                                                                    </div>

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
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="c4">Produktifitas (C4)</label>
                                                                    <input type="hidden" class="form-control " id="c4"
                                                                        name="c4" value="{{ old('c4') }}">

                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio"
                                                                                id="customRadio1" name="c4">
                                                                            <label for="customRadio1"
                                                                                class="custom-control-label">Custom
                                                                                Radio</label>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>















                                                    </div>


                                                    <!-- /.card-body -->

                                                    <div class="card-footer mt-3">


                                                        <div class="button-container float-left ">
                                                            <button type="submit" class="button " id="submit"
                                                                onclick="validation()"><span class="icon text-white-5 "><i
                                                                        class="far fa-paper-plane"></i>
                                                                    tambahkan </span></button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.info-box-content -->

                                </div>




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
