@extends('layout.index')
@section('content')

    <div class="container-fluid bg-primary">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Hasil</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Daftar hasil</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="hasil">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nik karyawan</th>
                                                    <th>hasil</th>
                                                    <th>status pengajuan</th>
                                                    <th>tanggal approve</th>
                                                    <th style="width: 20%" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div> --}}
@endsection
