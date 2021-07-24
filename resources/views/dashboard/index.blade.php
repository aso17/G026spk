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
                        <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#tentangmodal"
                            role="button">Pelajari</a>
                    </p>
                </div>
                <h4> </h4>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="tentangmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tentang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                            </ul>
                        </li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn detail btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
