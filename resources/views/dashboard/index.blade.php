@extends('layout./index')
@section('content')

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-12">
                <h1>Dasboard</h1>
                <div class="jumbotron bg-light">
                    <h1 class="display-4"></h1>
                    <p class="lead">Selamat datang {{ session('Username') }}</p>
                    <hr class="my-4">

                    <p class="lead">
                        <a class="btn btn-default btn-sm" href="#" role="button">Pelajari</a>
                    </p>
                </div>
                <h4> </h4>
            </div>
        </div>
    </div>
@endsection
