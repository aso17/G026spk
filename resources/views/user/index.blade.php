@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-2">
                    <div class="card-header  border-5 border border-primary">
                        <h5 class=""><i class="fas fa-bars"></i> Data User</h5>
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
                                        @if ($us->role == 3)
                                            <td>Admimistrator</td>
                                        @elseif($us->role == 2)
                                            <td>Supervisor</td>

                                        @elseif($us->role == 1)
                                            <td>Manager</td>

                                        @endif


                                        <td> {{ $us->departemen }}</td>


                                        <td class="">

                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light" id="hapus"
                                                data-toggle="modal" data-target="#deletemodal" data-nik-karyawan=""><i
                                                    class=" fas fa-trash-alt"></i>
                                                Delete</button>
                                            <a href="/user/{{ $us->karyawan_id }}"
                                                class="btn edit btn-sm mr-3 float-right text-light" id="ubah"><i
                                                    class="fas fa-edit"></i>
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
    <form action="/Userhapus" method="post">
        @csrf
        @method('delete')
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
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
                        <button class="btn cancel btn btn-sm float-left text-light" type="button" data-dismiss="modal">
                            Cancel</button>
                        <button id=" btn-delete" type="submit" class="btn edit btn  btn-sm text-light">
                            Ok</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
