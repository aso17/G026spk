@extends('layout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="bg-danger"><i class="fas fa-tag"> </i> Profile karyawan</h5>
                    <div class="card card-warning card-outline ">
                        <a href="/Karyawan" class="text-right mr-3 mt-3"><i class="fas fa-arrow-circle-left"></i> back</a>
                        <div class="card-body box-profile">

                            <div class="col-lg-5 d-flex py-3">
                                <img class="profile-user-img img-fluid " style="width: 200px; height:200px;"
                                    src="{{ asset('foto/' . $karyawan->foto) }}" alt="User profile picture">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-2">

                                <button class="btn hap btn btn-sm mr-3 float-right" id="hapus" data-toggle="modal"
                                    data-target="#deletemodal" data-nik-karyawan="{{ $karyawan->nik_karyawan }}"><i
                                        class=" fas fa-trash-alt"></i>
                                    Delete</button>
                                <a href=" #" class="btn fourth btn-sm mr-2 float-right" id="ubah"><i
                                        class="fas fa-edit"></i>
                                    Edit</a>

                            </div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-12">

                <div class="card card-default card-outline mb-4 ">
                    <div class="card-body box-profile    text-dark">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nik Karyawan</b> <a class="float-right">{{ $karyawan->nik_karyawan }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama lengkap</b> <a class="float-right">{{ $karyawan->nama_lengkap }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat/Tgl Lahir</b> <a
                                    class="float-right">{{ $karyawan->tempat_lahir . '/' . $karyawan->tanggal_lahir }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis kelamin</b> <a class="float-right">{{ $karyawan->jenis_kelamin }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status karyawan</b> <a class="float-right">{{ $karyawan->status_karyawan }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal mulai bekerja</b> <a
                                    class="float-right">{{ $karyawan->tanggal_mulaikerja }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Departemen</b> <a class="float-right">{{ $karyawan->departemen }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nomor telepon</b> <a class="float-right">{{ $karyawan->no_telepon }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $karyawan->email }}</a>
                            </li>

                        </ul>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- /.content -->


    <!-- /.content-wrapper -->
    {{-- modal hapus --}}
    <form action="/karyawanhapus" method="post">
        @csrf
        @method('delete')
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body bg-primary">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center">
                                <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                            </div>
                            <div class="col-9 pt-2">
                                <h5>Apakah anda yakin?</h5>
                                <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">

                    </div>
                    <div class="modal-footer border-warning">
                        <button class="btn btn- btn hap btn btn-sm float-left" type="button" data-dismiss="modal"><i
                                class="fas fa-times"> Cancel</i></button>
                        <button id="btn-delete" type="submit" class="btn fourth btn  btn-sm"><i class="fas fa-check">
                                Ok</i></button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#hapus', function() {
                const nikkar = $(this).data('nik-karyawan');

                $('#id').val(nikkar);


            })
        })

    </script>
@endsection
