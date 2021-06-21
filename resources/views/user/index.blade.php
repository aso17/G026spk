@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-2">
                    <div class="card-header  border-5 border border-primary">
                        <h5 class="bg-danger"> <i class="fas fa-tag ml-2"></i> Data User</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="user" class="table table-bordered table-sm table-hover table-responsive-sm">
                            <thead>


                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nik karyawan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Role</th>
                                    <th>Departemen</th>

                                    <th style="width: 20%" class="text-center ">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $us)


                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $us->nik_karyawan }}</td>
                                        <td>{{ $us->nama_lengkap }} </td>
                                        <td>{{ $us->jabatan }} </td>
                                        <td> {{ $us->departemen }}</td>


                                        <td class="">

                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light" id="hapus"
                                                data-toggle="modal" data-target="#deletemodal" data-nik-karyawan=""><i
                                                    class=" fas fa-trash-alt"></i>
                                                Delete</button>
                                            <a href="/kriteria/" class="btn edit btn-sm mr-3 float-right text-light"
                                                id="ubah"><i class="fas fa-edit"></i>
                                                Edit</a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
