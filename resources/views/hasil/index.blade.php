@extends('layout.index')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class=""><i class="fas fa-square-root-alt"></i> Hasil Penilaian Karyawan</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box">


                                    <div class="info-box-content">
                                        <h5 class=""><i class="fas fa-bars"></i> Nilai Ketentuan Sanksi</h5>
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"></span>
                                        <div class="row">
                                            @if (session('role') == 3)
                                                <div class="col">

                                                    <button class="btn btn-default btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal"><i
                                                            class="fas fa-plus-circle"></i></button>
                                                </div>
                                            @endif
                                        </div>
                                        <table class="table  table table-hover table-responsive-sm text-dark">
                                            <thead>
                                                <th>#</th>
                                                <th>nama sanksi</th>
                                                <th>Jenis ketentuan</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($ketentuan as $kte)


                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kte->nama_sanksi }}</td>
                                                        <td style="widht">{{ $kte->nilai_ketentuan }}</td>
                                                        @if (session('role') == 3)

                                                            <td class="justify-content-center">
                                                                <button class="btn hapus btn btn-sm float-right text-light"
                                                                    id="hapus" data-toggle="modal"
                                                                    data-target="#deletemodal"
                                                                    data-id_sank="{{ $kte->id }}"><i
                                                                        class=" fas fa-trash-alt"></i>
                                                                </button>

                                                                <button class="btn edit btn-sm mr-2 float-right text-light"
                                                                    data-toggle="modal" data-target="#ubahModal"
                                                                    data-id="{{ $kte->id }}"
                                                                    data-nm="{{ $kte->nama_sanksi }}"
                                                                    data-nilai="{{ $kte->nilai_ketentuan }}" id="ubah"><i
                                                                        class="fas fa-edit"></i></button>



                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.info-box-content -->

                                </div>




                            </div>
                        </div>


                        <div class="card card-outline">
                            <div class="card-header  ">
                                <h5 class=""><i class="fas fa-bars"></i> Daftar hasil</h5>
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
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $h->nik_karyawan }}</td>
                                                        <td>{{ $h->nama_lengkap }}</td>
                                                        <td>{{ $h->hasil }}</td>
                                                        <td>

                                                            @if ($h->sanksi_id == null)
                                                                <span class="badge bg-warning text-dark">Belum ada
                                                                    sanksi</span>
                                                            @endif
                                                            @if ($h->sanksi_id !== null)
                                                                <span
                                                                    class="badge text-dark">{{ $h->nama_sanksi }}</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($h->status_pengajuan == 'pending')
                                                                <span class="badge bg-warning text-dark">Pending</span>

                                                            @endif
                                                            @if ($h->status_pengajuan == 'approved')
                                                                <span class="badge bg-success text-dark">Di setujui</span>

                                                            @endif
                                                            @if ($h->status_pengajuan == 'not')
                                                                <span class="badge bg-dark text-light">Tidak
                                                                    disetujui</span>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($h->tgl_approve == null)
                                                                <span class="badge bg-warning text-dark">Pending</span>

                                                            @endif
                                                            @if ($h->status_pengajuan == 'approved')
                                                                <span
                                                                    class="badge bg-success text-dark">{{ $h->tgl_approve }}</span>

                                                            @endif
                                                            @if ($h->status_pengajuan == 'not')
                                                                <span
                                                                    class="badge bg-dark text-light">{{ $h->tgl_approve }}</span>

                                                            @endif
                                                        </td>
                                                        <td>

                                                            @if (session('role') == 1)

                                                                <button
                                                                    class="btn detail btn bg-gradient-info btn-sm text-dark ml-2 float-right"
                                                                    data-toggle="modal" data-target="#approve"
                                                                    data-karyawanid="{{ $h->karyawan_id }}"
                                                                    data-nik="{{ $h->nik_karyawan }}"
                                                                    data-sanksi="{{ $h->nama_sanksi }}"
                                                                    data-nama_l="{{ $h->nama_lengkap }}"
                                                                    data-jaba="{{ $h->jabatan }}"
                                                                    data-foto="{{ $h->foto }}"
                                                                    data-h="{{ $h->hasil }}" id="persetujuan" @if ($h->sanksi_id == null) disabled @endif>
                                                                    <i class="fas fa-arrow-circle-right text-danger"></i>
                                                                    Persetujuan</button>
                                                            @endif

                                                            @if (session('role') == 2)

                                                                <button
                                                                    class="btn detail btn bg-gradient-info btn-sm text-dark float-right ml-2 "
                                                                    data-toggle="modal" data-target="#sanksi-detail"
                                                                    data-karyawanid="{{ $h->karyawan_id }}"
                                                                    data-nik="{{ $h->nik_karyawan }}"
                                                                    data-nama_l="{{ $h->nama_lengkap }}"
                                                                    data-jaba="{{ $h->jabatan }}"
                                                                    data-foto="{{ $h->foto }}"
                                                                    data-h="{{ $h->hasil }}" id="sanksi"> <i
                                                                        class="fas fa-arrow-circle-right text-danger"></i>
                                                                    Sanksi</button>

                                                            @endif
                                                            @if (session('role') == 3)
                                                                <button class="btn detail btn  btn-sm text-light  "
                                                                    data-toggle="modal" data-target="#sanksi-detail"
                                                                    data-karyawanid="{{ $h->karyawan_id }}"
                                                                    data-nik="{{ $h->nik_karyawan }}"
                                                                    data-nama_l="{{ $h->nama_lengkap }}"
                                                                    data-jaba="{{ $h->jabatan }}"
                                                                    data-foto="{{ $h->foto }}"
                                                                    data-h="{{ $h->hasil }}" id="sanksi"> <i
                                                                        class="fas fa-arrow-circle-right text-danger"></i>
                                                                    Sanksi</button>
                                                                <button class="btn detail btn  btn-sm text-light "
                                                                    data-toggle="modal" data-target="#approve"
                                                                    data-karyawanid="{{ $h->karyawan_id }}"
                                                                    data-nik="{{ $h->nik_karyawan }}"
                                                                    data-sanksi="{{ $h->nama_sanksi }}"
                                                                    data-nama_l="{{ $h->nama_lengkap }}"
                                                                    data-jaba="{{ $h->jabatan }}"
                                                                    data-foto="{{ $h->foto }}"
                                                                    data-h="{{ $h->hasil }}" id="persetujuan">
                                                                    <i class="fas fa-arrow-circle-right text-danger"></i>
                                                                    Persetujuan</button>


                                                            @endif
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
    <form action="/sanksi" method="post">
        @csrf
        @method('delete')
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body bg-light">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center">
                                <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                            </div>
                            <div class="col-9 pt-2">
                                <h5>Apakah yakin akan di hapus?</h5>

                            </div>
                        </div>
                        <input type="hidden" name="idsanksi" id="idsanksi">

                    </div>
                    <div class="modal-footer border-warning">
                        <button class="btn cancel btn btn-sm float-left text-light" type="button" data-dismiss="modal">
                            Cancel</button>
                        <button id=" btn-delete" type="submit" class="btn edit btn  btn-sm text-light">OK</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- //modalbox sanksi --}}
    <div class="modal fade" id="sanksi-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit ml-2">Form Pemberian Sanksi</i>
                    </h5>
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
                                @method('patch')
                                <input type="hidden" id="id_kar" name="id_kar">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Pilih sanksi</label>
                                    <select class="form-control" name="id_sanksi">
                                        <option hidden>Pilih</option>
                                        @foreach ($sanksi as $s)
                                            <option value="{{ $s->id }}">
                                                {{ $s->nama_sanksi }} ({{ $s->nilai_ketentuan }})</option>
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
                                    <input type="date" class="form-control  @error('tgl_pengajuan') is-invalid @enderror"
                                        id="tgl_pengajuan" name="tgl_pengajuan">
                                    @error('tgl_pengajuan')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn tambah  btn-sm"> <i class="far fa-paper-plane"></i> Save</button>
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal"><i
                            class="fas fa-arrow-circle-left"></i> Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    {{-- //modalbox --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
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
    {{-- //modalbox --}}
    {{-- modalubah ketentuan sanksi --}}
    <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Alternatif sanki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ '/sanksi' }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id_sanksi" id="id_sanksi">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Sanksi</label>
                            <input type="text" class="form-control " id="namasanksi" name="namasanksi">

                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nilai Ketentuan</label>
                            <input type="text" class="form-control " id="nilaiketentuan" name="nilaiketentuan">

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- //modalbox persetujuan --}}
    <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit ml-2">Form Persetujuan Sanki</i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="img" class="profile-user-img img-fluid" style="width:200px; height:200px;"
                                        src="" alt="User profile picture">
                                </div>
                                <strong>

                                    <p class="text-center mt-2" id="nik"></p>
                                </strong>

                            </div>

                        </div>
                        <ul class="list-group">

                            <li class="list-group-item mt-0">

                                <p id="nma"></p>
                            </li>
                            <li class="list-group-item mt-0">
                                <p id="sa"></p>
                            </li>
                            <li class="list-group-item mt-0">
                                <p id="hasi"></p>
                            </li>
                            <li class="list-group-item mt-0">
                                <p id="jaba"></p>
                            </li>
                    </div>
                    <div class="col-md-6">

                        <div class="modal-body">
                            <form action="{{ '/sanksi' }}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" id="idkar" name="idkar">
                                <div class="form-group">

                                    <label for="recipient-name" class="col-form-label">Persetujuan</label>
                                    <hr class="border-primary">
                                    <div class="custom-control custom-radio mt-3">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="approve"
                                            value="approved">
                                        <label for="customRadio1" class="custom-control-label">Disetujui</label>
                                    </div>
                                    <div class="custom-control custom-radio mt-3">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="approve"
                                            value="not">
                                        <label for="customRadio2" class="custom-control-label">Tidak disetujui</label>
                                    </div>

                                    @error('id_sanksi')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tanggal Persetujuan</label>
                                    <input type="date" class="form-control  @error('tgl_approve') is-invalid @enderror"
                                        id="tgl_approve" name="tgl_approve">
                                    @error('tgl_approve')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn tambah  btn-sm"> <i class="far fa-paper-plane"></i> Save</button>
                    <button type="button" class="btn cancel btn-sm text-light" data-dismiss="modal"><i
                            class="fas fa-arrow-circle-left"></i> Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#sanksi', function() {
                const id = $(this).data('karyawanid');
                const nik = $(this).data('nik');
                const nama = $(this).data('nama_l');
                const hasil = $(this).data('h');
                const jabatan = $(this).data('jaba');
                const gamb = $(this).data('foto');

                $('#id_kar').val(id);
                $('#nik_k').text(nik);
                $('#has').text(hasil);
                $('#ja').text(jabatan);
                $('#nm').text(nama);
                $('#gam').attr('src', '{{ asset('foto') }}/' + gamb);


            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#persetujuan', function() {
                const idkar = $(this).data('karyawanid');
                const nik = $(this).data('nik');
                const nm_sank = $(this).data('sanksi');
                const nama = $(this).data('nama_l');
                const hasil = $(this).data('h');
                const jabatan = $(this).data('jaba');
                const gamb = $(this).data('foto');

                $('#idkar').val(idkar);
                $('#nik').text(nik);
                $('#hasi').text(hasil);
                $('#sa').text(nm_sank);
                $('#jaba').text(jabatan);
                $('#nma').text(nama);
                $('#img').attr('src', '{{ asset('foto') }}/' + gamb);


            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#ubah', function() {
                const id_s = $(this).data('id');
                const nama = $(this).data('nm');
                const nilai_i = $(this).data('nilai');

                $('#id_sanksi').val(id_s);
                $('#namasanksi').val(nama);
                $('#nilaiketentuan').val(nilai_i);

            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#hapus', function() {
                const id_sa = $(this).data('id_sank');
                $('#idsanksi').val(id_sa);


            })
        })
    </script>
    <script>
        $("#hasil").DataTable({

            "responsive": true,
            "autoWidth": true,
            "info": false,
            "lengthChange": true,
            "scrollY": 200,
            "paging": true,

        });
    </script>
@endsection
