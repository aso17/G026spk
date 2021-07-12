@extends('layout.index')
@section('content')

    <div class="container-fluid ">

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
                                                    <th>Departemen</th>
                                                    <th>jabatan</th>
                                                    <th>Status Karyawan</th>




                                                    <th style="width" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($detailKaryawan as $d)



                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->nik_karyawan }}</td>
                                                        <td>{{ $d->nama_lengkap }}</td>
                                                        <td>{{ $d->departemen }} </td>
                                                        <td>{{ $d->jabatan }} </td>
                                                        <td>{{ $d->status_karyawan }} </td>
                                                        <td class="justify-content-center">
                                                            <a href="{{ 'proses/hitung/' . $d->id }}"> <button
                                                                    class="btn-dark btn btn-sm mr-2  float-right text-light"><i
                                                                        class="fas fa-ey" id="proses"></i> Proses</button>
                                                            </a>
                                                            <a href="{{ '/prosesEdit/' . $d->id }}">
                                                                <button
                                                                    class="btn detail btn btn-sm mr-2  float-right text-light"
                                                                    id="edit"><i class="fas fa-edit"></i>
                                                                    Edit</button>
                                                            </a>
                                                            <a href="{{ '/prosesShow/' . $d->id }}" id="view">
                                                                <button
                                                                    class="btn edit btn-sm mr-2 float-right text-light"><i
                                                                        class="fas fa-eye"></i> View</button>
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
