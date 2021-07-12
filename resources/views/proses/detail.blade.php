@extends('layout.index')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

                <h4>Detail Nilai Karyawan</h4>
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                    <div class="card-body box-profile">
                        <div class="">
                            <img id="img" class="profile-user-img img-fluid" style="width:150px; height:150px;"
                                src="{{ asset('foto/' . $karyawan->foto) }}" alt="User profile picture">
                        </div>
                        <strong>

                            <p class="text-center mt-2" id="nik"></p>
                        </strong>

                    </div>

                    <ul class="list-group">

                        <li class="list-group-item mt-0">

                            <p id="nma">{{ $karyawan->nama_lengkap }}</p>
                        </li>
                        <li class="list-group-item mt-0">
                            <p id="sa">{{ $karyawan->jabatan }}</p>
                        </li>
                        <li class="list-group-item mt-0">
                            <p id="hasi">{{ $karyawan->departemen }}</p>
                        </li>
                        <li class="list-group-item mt-0">
                            <p id="jaba">{{ $karyawan->nama_lengkap }}</p>
                        </li>


                </div>
                <div class="col-md-6">

                    <ul class="list-group">
                        @foreach ($normalisasi as $normali)

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h6 class=" font-weight-bold text- "> Kriteria</h6>
                                {{ $normali->nama_kriteria }}

                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $normali->sub_kriteria }}
                                <span class="badge badge-dark ">{{ $normali->bobot_subkriteria }}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="card-footer">

                <a href="{{ '/proses' }}" class="btn btn-warning btn-icon-split btn-sm float-right"
                    style="margin-bottom: 5px;"><span class="icon text-white-5">
                        <i class="fas fa-arrow-circle-left"></i></span>
                    <span class="font-weight-bold text-danger">Back</span></a>
            </div>
        </div>
    </div>




@endsection
