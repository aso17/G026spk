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



                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Daftar Proses</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="proses">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nik karyawan</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>bobot C2</th>
                                                    <th>bobot C2</th>
                                                    <th>bobot C3</th>



                                                    <th style="width" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detail as $d)



                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->nik_karyawan }}</td>
                                                        <td>{{ $d->nama_lengkap }}</td>
                                                        <td>{{ $d->bobot_c1 }} </td>
                                                        <td>{{ $d->bobot_c2 }} </td>
                                                        <td> {{ $d->bobot_c3 }}</td>




                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-1 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="" class="btn edit btn-sm mr-2 float-right text-light"
                                                                id="ubah"><i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href=""
                                                                class="btn detail btn btn-sm mr-2  float-right text-light"
                                                                id="sub_kriteria"><i class="fas fa-eye"></i>

                                                            </a>

                                                            <a href="{{ 'proses/hitung/' . $d->id }}"
                                                                class="btn detail btn btn-sm mr-2  float-right text-light"
                                                                id="proses"><i class="fas fa-ey">Proses</i>

                                                            </a>


                                                        </td>
                                                    </tr>

                                                @endforeach



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

@endsection
