@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-2">
                    <div class="card-header" style="border-block-color: #2F4F4F">
                        <h5 class=""><i class="fas fa-bars"></i> Daftar Karyawan</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="karyawan" class="table table-bordered table-sm table-hover table-responsive-sm">
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

                                @foreach ($karyawan as $kar)

                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td> {{ $kar->nik_karyawan }} </td>
                                        <td> {{ $kar->nama_lengkap }} </td>

                                        <td> {{ $kar->jenis_kelamin }} </td>
                                        <td> {{ $kar->status_karyawan }} </td>
                                        <td> {{ $kar->no_telepon }} </td>
                                        <td class="">

                                            <a href="/karyawan/{{ $kar->id }}"
                                                class="btn detail btn  btn-sm text-light ml-3" id="detail"
                                                style="height: 300%"><i class="fas fa-arrow-circle-right text-light"></i>
                                                View</a>

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
    <script>
        $("#karyawan").DataTable({

            "responsive": true,
            "autoWidth": true,
            "info": false,
            "lengthChange": true,
            "scrollY": 400,
            "paging": true,
            <?php if(session('role')==3){?>
            dom: 'Bfrtip',
            buttons: [{
                text: 'Creat Karyawan',
                action: function() {
                    window.location.href = "/karyawan/tambah"
                }
            }]
            <?php }?>
        });
    </script>
@endsection
