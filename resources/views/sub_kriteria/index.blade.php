@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">


                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/Kriteria" class="text-left float-right  mr-3 mt-3" style="color:#2F4F4F"><i
                                class="fas fa-arrow-circle-left"></i> back</a>

                        <div class="col-md-7">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box">


                                <div class="info-box-content">
                                    <div class="card-header" style="border-block-color: #2F4F4F">
                                        <h5 class=""><i class="fas fa-bars"></i> Kriteria</h5>
                                    </div>

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
                                <h5 class=""><i class="fas fa-bars"></i> Sub kriteria</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm" id="subkriteria">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>

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

                                                        <td>{{ $sub->sub_kriteria }} </td>
                                                        <td>{{ $sub->bobot_subkriteria }}</td>


                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-id-subkriteria="{{ $sub->id }}"
                                                                data-id-kriteria="{{ $sub->id_kriteria }}"><i
                                                                    class=" fas fa-trash-alt"></i>
                                                                Delete</button>
                                                            <a href="/subkriteria/{{ $sub->id }}">
                                                                <button class="btn edit btn-sm mr-3 float-right text-light"
                                                                    id="ubah">
                                                                    <i class="fas fa-edit"></i> Edit</button>
                                                            </a>

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

    {{-- modal hapus --}}
    <form action="/subkriteriadelete" method="post">
        @csrf
        @method('delete')
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body bg-dark">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center">
                                <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                            </div>
                            <div class="col-9 pt-2">
                                <h5>Apakah anda yakin?</h5>
                                <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                            </div>
                        </div>
                        <input type="hidden" name="id_k" id="id_k">
                        <input type="hidden" name="id_sub" id="id_sub">

                    </div>
                    <div class="modal-footer border-warning">
                        <button class="btn cancel btn btn-sm float-left text-light" type="button" data-dismiss="modal"><i
                                class="fas fa-times"></i> Cancel</button>
                        <button id=" btn-delete" type="submit" class="btn edit btn  btn-sm text-light"><i
                                class="fas fa-check">
                            </i> Ok</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#hapus', function() {
                const id_kriteria = $(this).data('id-kriteria');
                const idsubkriteria = $(this).data('id-subkriteria');

                $('#id_k').val(id_kriteria);
                $('#id_sub').val(idsubkriteria);


            })
        })
    </script>
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
