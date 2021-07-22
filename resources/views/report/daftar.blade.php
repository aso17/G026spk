@extends('layout.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/styles.css') }}" />
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">



                        <div class="card card-outline">
                            <h4 class="mt-2 pl-2">PT.Indomarco Prismatama</h4>
                            <div class="card-header  ">
                                <h5 class=" text-dark text-center pl-2"> Report Sanksi</h5>
                                <h6 class=" text-dark text-center"><span class="text-primary">
                                        Tanggal:</span>{{ $tgl_awal }} <span class="text-primary">
                                        s/d </span>{{ $tgl_ahir }}

                                </h6>
                                <p class="text-right m-0">Tanggal cetak : {{ date('d/m/y') }}</p>
                                <p class="text-right m-0">User : {{ session('nik_karyawan') }}</p>

                                <a href="{{ url('/cetak/' . $tgl_awal . '/' . $tgl_ahir . '/' . $sanksi) }}"
                                    target="_BLANK"><button class="btn btn-default btn-sm m-0">
                                        <i class="fas fa-file-pdf"></i>
                                        Export
                                        pdf</button></a>
                            </div>
                            <div class="card-body">



                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="report">
                                            <thead>


                                                <tr class="text">
                                                    <th>NO</th>
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
                                                        @if ($h->tgl_approve == false)
                                                            <td>
                                                                Belum ada
                                                            </td>

                                                        @else
                                                            <td>

                                                                {{ $h->tgl_approve }}
                                                            </td>
                                                        @endif
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
