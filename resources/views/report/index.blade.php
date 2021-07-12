@extends('layout.index')
@section('content')

    <div class="container-fluid ">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="bg-danger"><i class="fas fa-tag"></i> Laporan</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-10" style="overflow: initial">
                                        <!-- general form elements -->


                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="post" action="/report" enctype="">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id_sanksi">Kategori sanksi</label>
                                                            <select name="id_sanksi"
                                                                class="form-control @error('id_sanksi') is-invalid @enderror "
                                                                id="id_sanksi" name="id_sanksi" value="<">
                                                                <option value="{{ old('id_sanksi') }}" hidden>-- pilih--
                                                                </option>
                                                                @foreach ($sanksi as $sank)

                                                                    <option value="{{ $sank->id }}"
                                                                        {{ @old('id_sanksi') }}>
                                                                        {{ $sank->nama_sanksi }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            @error('id_sanksi')

                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="tgl_awal">Tanggal </label>
                                                            <input type="date"
                                                                class="form-control @error('tgl_awal') is-invalid @enderror "
                                                                id="tgl_awal" name="tgl_awal"
                                                                value="{{ old('tgl_awal') }}" autocomplete="off">

                                                            @error('tgl_awal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="tgl_ahir">Sampai Dengan Tanggal</label>
                                                            <input type="date"
                                                                class="form-control @error('tgl_ahir') is-invalid @enderror "
                                                                id="tgl_ahir" name="tgl_ahir"
                                                                value="{{ old('tgl_ahir') }}" autocomplete="off">

                                                            @error('tgl_ahir')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class=" btn tambah btn btn-sm float-right mr-3 " type="submit"
                                                name="submit"></i> Priview</button>


                                            <!-- /.card-body -->
                                        </form>


                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
