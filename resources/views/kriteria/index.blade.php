@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">


                        <div class="card card-outline">
                            <div class="card-header" style="border-block-color: #2F4F4F">
                                <h5 class=""><i class="fas fa-bars"></i> Kriteria Perhitungan</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm" id="kriteria">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>kode</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Type</th>

                                                    <th style="width: 30%" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($kriteria as $krite)


                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td> {{ $krite->kode_kriteria }} </td>
                                                        <td>{{ $krite->nama_kriteria }}</td>
                                                        <td>{{ $krite->bobot }}</td>
                                                        <td>{{ $krite->type }}</td>

                                                        <td class="justify-content-center">
                                                            <button class="btn hapus btn btn-sm mr-3 float-right text-light"
                                                                id="hapus" data-toggle="modal" data-target="#deletemodal"
                                                                data-id-kriteria="{{ $krite->id }}"><i
                                                                    class=" fas fa-trash-alt"></i>
                                                            </button>
                                                            <a href="/kriteria/{{ $krite->id }}">
                                                                <button class="btn edit btn-sm mr-3 float-right text-light"
                                                                    id="ubah"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <a href="/Sub_kriteria/{{ $krite->id }}">
                                                                <button
                                                                    class="btn detail btn btn-sm mr-3 text-light float-right"
                                                                    id="sub_kriteria"> Sub kriteria</button>

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
    <form action="/kriteria" method="post">
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
                        <input type="hidden" name="id" id="id">

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

                $('#id').val(id_kriteria);


            })
        })
    </script>

@endsection
