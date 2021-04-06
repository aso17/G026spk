<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>G026Spk</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/dark.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/dist/css/code_css_gue.css') }} ">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    <!-- Sweetalert -->
    <script src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('asset/plugins/toastr/toastr.min.js') }}"></script>

</head>

<body class="hold-transition login-page bg-secondary">
    <div class="login-box ">


        <!-- /.login-logo -->
        <div class="card bg-dark shadow bg-danger rounded justify-content-center">




            <h5 class=" font-weight-bold text-left ml-4 mx-3 mt-3"
                style="font-family: Verdana, Geneva, Tahoma, sans-serif"> <strong>PT.</strong> Indomarco Prismatama
            </h5>
            <span class=" font text-left ml-4 "><strong>S</strong>istem <strong>P</strong>endukung
                <strong>K</strong>eputusan</span>
            <div class="card-body login-card-body bg-dark ">
                <div class=" login-logo mx-auto">
                    <img src="{{ asset('asset/images/logo.jpg') }} " alt="Logo"
                        class="  elevation-3 mb-3  float-left" style="opacity: 17" width="313px" height="100px"
                        class="img-thumbnail">
                </div>
                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="input-group ">
                        <input type="text" class="form-control " placeholder="Nik karyawan" name="nik_karyawan"
                            autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>

                        </div>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control " placeholder="Password" name="password"
                            autocomplete="off">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="row mt-3">

                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-info btn-block">Sig IN</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>
