<div class="container-fluid">

    <style>
        h3 {
            text-align: left;
            margin: 0%;
        }

        h5 {
            text-align: center;
            margin: 0%;
        }

        h4 {
            text-align: center;
            margin: 0%;
        }

        p {
            text-align: right;
            margin: 0%;
            margin-top: 0%;
            margin-bottom: 3px;
        }

        .table {}

        th {
            height: 40px;
            width: 90px;
            padding: 0%;
        }

        td {
            text-align: center;
            width: 70px
        }

        .m {
            text-align: right;
            margin-right: 30px;
            margin-top: 80px;
        }



        .table {
            text-align: left;
            margin-right: 30px;
            margin-top: 50px;

        }

    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">



                    <div class="card card-outline">
                        <h3 class="mt-2 pl-2">PT.Indomarco Prismatama</h3><br>
                        <h3 class="mt-2 pl-2">GO26 DC Tangerang</h3>
                        <div class="card-header  ">
                            <h4 class=" text-dark text-center pl-2"> Laporan Sanksi Kinerja karyawan</h4>
                            <h5 class=" text-dark text-center"><span class="text-primary">
                                    Tanggal: </span>{{ $tgl_awal }} <span class="text-primary">
                                    s/d</span> {{ $tgl_ahir }} <br>

                                <span class="text-right m-0">Tanggal cetak : {{ date('d/m/y') }}</span>
                            </h5>
                            <p class="text-right m-0">User : {{ session('nik_karyawan') }}</p>


                        </div>
                        <hr>
                        <div class="card-body">



                            <div class="row">
                                <div class="col-md">
                                    <table class="table table-sm table-hover table-responsive-sm text-dark" id="report">
                                        <thead>


                                            <tr class="text">
                                                <th style="width: 5px">No.</th>
                                                <th>Nik karyawan</th>
                                                <th>Nama lengkap</th>
                                                <th>Hasil</th>
                                                <th>Nama Sanksi</th>
                                                <th>Status</th>
                                                <th>Tanggal pengajuan</th>
                                                <th style="">Tanggal approve</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($hasil as $h)
                                                <tr>
                                                    <td>{{ $loop->iteration }}.</td>
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
                            <table class="table" border="0">
                                <tr>

                                    <td style="width:350px;text-align:center;">Disetujui(Manager)</td>

                                    <td class="m" style="width:350px;text-align:center;">Mengetahui(SPV)
                                    </td>
                                </tr>

                                <tr>

                                    <td style="width:350px;text-align:center;height:200px">
                                        (.................................................)</td>

                                    <td class="m" style="width:350px;text-align:center; ">
                                        (.................................................)</td>
                                </tr>

                            </table>
                            {{-- <div class="row">
                                <div class="col-md-6">

                                    <p id="mengetahui" class="m">Mengetahui(SPV)</p>
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>
                                <p class="page1" align='right'>(........................................)</p>
                                <div class="col-md-6">

                                    <p id="mengetahui" class="n">Disetujui(Manager)</p>
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>
                                <p class="n">(........................................)</p>
                            </div> --}}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
