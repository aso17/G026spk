@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Detail Kriteria</h5>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/kriteria" class="text-right float-right"><i class="fas fa-arrow-circle-left"></i> back</a>

                        <div class="col-md-7">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box">


                                <div class="info-box-content">
                                    <h5 class="bg-primary mt-3"><i class="fas fa-tag "></i> Kriteria</h5>

                                    <span class="info-box-text"></span>
                                    <span class="info-box-number"></span>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $kriteria->kode_kriteria }}</li>
                                        <li class="list-group-item">{{ $kriteria->nama_kriteria }}</li>
                                        <li class="list-group-item">{{ $kriteria->bobot }}</li>
                                        <li class="list-group-item">{{ $kriteria->type }}</li>

                                    </ul>

                                </div>
                                <!-- /.info-box-content -->

                            </div>




                        </div>

                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Sub kriteria</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm" id="subkriteria">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>kode Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot sub kriteria</th>


                                                    <th style="width: 20%" class="text-center text-primary">Option
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($subkriteria as $sub)



                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>{{ $sub->kode_kriteria }}</td>
                                                        <td>{{ $sub->sub_kriteria }} </td>
                                                        <td>{{ $sub->bobot_subkriteria }}</td>


                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-nik-karyawan=""><i class=" fas fa-trash-alt"></i>
                                                                Delete</button>
                                                            <a href="/kriteria/"
                                                                class="btn edit btn-sm mr-3 float-right text-light"
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
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#subkriteria").DataTable({

            "responsive": false,
            "autoWidth": true,
            "info": false,
            "lengthChange": false,
            "paging": false,
            dom: 'Bfrtip',
            buttons: [{
                text: 'Tambah sub kriteria',
                position: 'top-end',
                action: function() {
                    window.location.href = "{{ url('/sub_kriteria/tambah/' . $kriteria->id) }}"
                }
            }]
        });

    </script>
@endsection
