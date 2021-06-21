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
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>No telpon</th>
                                    <th style="width: 10%" class="text-center ">Option</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>.</td>
                                    <td> </td>
                                    <td> </td>

                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td class="">

                                        <a href="" class="btn detail btn bg-gradient-info btn-sm text-dark ml-3" id="detail"
                                            style="height: 300%"><i class="fas fa-arrow-circle-right text-danger"></i>
                                            View</a>

                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
