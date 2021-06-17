@extends('layout.index')
@section('content')

    <div class="container-fluid bg-primary">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Hasil</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class="bg-warning"><i class="fas fa-tag"></i>Daftar hasil</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-sm table-hover table-responsive-sm text-dark" id="hasil">
                                            <thead>


                                                <tr class="text">
                                                    <th>#</th>
                                                    <th>Nik karyawan</th>
                                                    <th>Nama lengkap</th>
                                                    <th>Hasil</th>
                                                    <th>Sanksi</th>
                                                    <th>Status</th>
                                                    <th style="">Tanggal approve</th>
                                                    <th style="" class="text-center text-primary">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hasil_ahir as $h)

                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $h->nik_karyawan }}</td>
                                                        <td>{{ $h->nama_lengkap }}</td>
                                                        <td>{{ $h->hasil }}</td>
                                                        <td></td>
                                                        <td>
                                                            @if ($h->status_pengajuan == 'pending')
                                                                <span class="badge bg-warning text-dark">Pending</span>

                                                            @endif
                                                            @if ($h->status_pengajuan == 'disetujui')
                                                                <span class="badge bg-success text-dark">Di setujui</span>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($h->tgl_approve == null)
                                                                <span class="badge bg-warning text-dark">Pending</span>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-default btn-sm float-right ml-2"
                                                                data-toggle="modal" data-target="#sanksi-detail"
                                                                data-nik="{{ $h->nik_karyawan }}"
                                                                data-nama_l="{{ $h->nama_lengkap }}"
                                                                data-jaba="{{ $h->jabatan }}"
                                                                data-foto="{{ $h->foto }}" data-h="{{ $h->hasil }}"
                                                                id="sanksi">Sanksi</button>
                                                            <button class="btn btn-default btn-sm float-right"
                                                                data-toggle="modal"
                                                                data-target="#approve">Persetujuan</button>
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
    {{-- //modalbox sanksi --}}
    <div class="modal fade" id="sanksi-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="exampleModalLabel">Form sanki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="gam" class="profile-user-img img-fluid" style="width:200px; height:200px;"
                                        src="" alt="User profile picture">
                                </div>
                                <strong>
                                    <p class="text-center mt-2" id="nik_k"></p>
                                </strong>
                                <p class="text-center mt-2" id="calon"></p>
                            </div>

                        </div>
                        <ul class="list-group">

                            <li class="list-group-item mt-0">
                                <p id="nm"></p>
                            </li>
                            <li class="list-group-item mt-0">
                                <p id="has"></p>
                            </li>
                            <li class="list-group-item mt-0">
                                <p id="ja"></p>
                            </li>
                    </div>
                    <div class="col-md-6">

                        <div class="modal-body">
                            <form action="{{ '/sanksi' }}" method="post">
                                @csrf


                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Pilih sanksi</label>
                                    <select class="form-control" name="id_sanksi">
                                        <option hidden>Pilih</option>
                                        @foreach ($sanksi as $s)
                                            <option value="{{ $s->id }}">
                                                {{ $s->nama_sanksi }}({{ $s->nilai_ketentuan }})</option>
                                        @endforeach

                                    </select>


                                    @error('id_sanksi')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tanggal sanksi</label>
                                    <input type="date" class="form-control  @error('nilai_ketentuan') is-invalid @enderror"
                                        id="nilai_ketentuan" name="nilai_ketentuan">
                                    @error('nilai_ketentuan')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    {{-- //modalbox persetujuan --}}
    <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Alternatif sanki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ '/sanksi' }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Sanksi</label>
                            <input type="text" class="form-control  @error('nama_sanksi') is-invalid @enderror"
                                id="nama_sanksi" name="nama_sanksi">
                            @error('nama_sanksi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nilai Ketentuan</label>
                            <input type="text" class="form-control  @error('nilai_ketentuan') is-invalid @enderror"
                                id="nilai_ketentuan" name="nilai_ketentuan">
                            @error('nilai_ketentuan')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#sanksi', function() {
                const nik = $(this).data('nik');
                const nama = $(this).data('nama_l');
                const hasil = $(this).data('h');
                const jabatan = $(this).data('jaba');
                const gamb = $(this).data('foto');

                $('#nik_k').text(nik);
                $('#has').text(hasil);
                $('#ja').text(jabatan);
                $('#nm').text(nama);
                $('#gam').attr('src', '{{ asset('foto') }}/' + gamb);


            })
        })

    </script>
@endsection
