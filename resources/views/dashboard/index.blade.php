@extends('layout./index')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Dasboard</h1>
                <h4> Selamat datang {{ session('Username') }} </h4>
            </div>
        </div>
    </div>
@endsection
