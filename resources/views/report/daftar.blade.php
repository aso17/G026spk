@extends('layout.index')
@section('content')

    <div class="container-fluid bg-primary">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">



                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-dark pl-2"> Report Daftar hasil</h5>
                            </div>
                            <div class="card-body">
                                <select class="btn btn-dark text-light mb-2" name="cetak" value="">
                                    <option hidden>cetak
                                    </option>
                                    <option><a href="http://">pdf</a>
                                    </option>


                                </select>
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="report">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nik karyawan</th>
                                                    <th>Nama lengkap</th>
                                                    <th>Hasil</th>
                                                    <th>Sanksi</th>
                                                    <th>Status</th>
                                                    <th>tanggal pengajuan</th>
                                                    <th style="">Tanggal approve</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($hasil as $h)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $h->nik_karyawan }}</td>
                                                        <td>{{ $h->nama_lengkap }}</td>
                                                        <td>{{ $h->hasil }}</td>
                                                        <td>{{ $h->nama_sanksi }}</td>
                                                        <td>{{ $h->status_pengajuan }}</td>
                                                        <td>{{ $h->tgl_pengajuan }}</td>
                                                        <td>{{ $h->tgl_approve }}</td>
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
