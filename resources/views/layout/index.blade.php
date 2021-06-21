<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css ') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }} ">
    {{-- code css gue --}}

    <link rel="stylesheet" href="{{ asset('asset/dist/css/code_css_gue.css') }} ">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.dataTables.min.css') }}">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">



    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/plugins/jquery/jquery.min.js') }} ">
    </script>
    <!-- Bootstrap 4 -->
    <script language="JavaScript" type="text/javascript"
        src=" {{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    {{-- js gue --}}
    <script language="JavaScript" type="text/javascript" src="{{ asset('asset/dist/js/code_gue.js') }}"></script>
    <!-- DataTables -->
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <!-- Sweetalert -->
    <script language="JavaScript" type="text/javascript"
        src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <scrip language="JavaScript" type="text/javascript" src="{{ asset('asset/plugins/toastr/toastr.min.js') }}">
        </script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars bg-warning"></i></a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <button onclick="logConfirm('')" class="btn btn btn-sm text-light" class="nav-link "
                        id=" logoutmodal" data-toggle="modal" data-target="#logoutmodal"
                        style="background-color:#e01d1d"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 text-center bg-primary">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('asset/images/logo.jpg') }} " alt="AdminLTE Logo" class="" style=" " width="220px"
                    height="70px" class="img-thumbnail"><br>
                <span class=" brand-text  font-weight-light font-weight-bold shadow">G026spk</span> <br>
                <small>PT.Indomarco Prismatama</small>

            </a>

            <!-- Sidebar -->
            <div class="sidebar ">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-4 ">
                    <ul class="nav nav-pills nav-sidebar flex-column  " data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item  mx-4">
                            <a href="{{ url('/') }}" class="nav-link ">
                                <h6 class="text-light ">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </h6>

                            </a>
                        </li>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item  text-dark">
                                <a href="{{ url('/Karyawan') }}" class="nav-link ">
                                    <h6 class="text-light ">
                                        <i class="fas fa-address-card pr-1 ml-4"></i>Data karyawan
                                    </h6>
                                </a>
                            </li>

                            <li class="nav-item mr-1">
                                <a href="{{ url('/kriteria') }}" class="nav-link ">
                                    <h6 class="ml-2 text-light ">
                                        <i class="fas fa-columns mr-1"></i>Data Kriteria

                                    </h6>
                                </a>


                            </li>


                            <li class="nav-item ml-2">
                                <a href="{{ url('/proses') }}" class="nav-link">
                                    <h6 class="mr-2 text-light">
                                        <i class="fab fa-accusoft"></i>
                                        Proses/ Nilai
                                    </h6>
                                </a>
                            </li>
                            <li class="nav-item ml-2">
                                <a href="{{ url('/hasil') }}" class="nav-link">
                                    <h6 class="mr-2 text-light">
                                        <i class="fas fa-fax"></i>
                                        Hasil Proses
                                    </h6>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <h6 class="ml- text-light mr-4">
                                        <i class="fas fa-file-invoice mr-1"></i>
                                        Laporan
                                    </h6>
                                </a>
                            </li>





                            <li class="nav-item ">
                                <a href="{{ '/user' }}" class="nav-link" class="nav-link mr-2">
                                    <h6 class="ml-1 text-light mr-4">
                                        <i class="fas fa-user-cog"></i>
                                        All User
                                    </h6>
                                </a>
                            </li>




                        </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer bg-dark">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Powered by <a href="https://gisaka.net/">A_so</a>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <a href="">G026spk</a> .</strong> All
            rights
            reserved.
        </footer>
    </div>
    <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                            <i class="fas fa-exclamation" style="font-size: 70px; color:#008B8B;"></i>
                        </div>
                        <div class="col-9 pt-2">
                            <h6>yakin ingin keluar?</h6>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <a id="btn-log" class="btn btn-danger">keluar</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- Alert Config -->





</body>

</html>
@if (session('success'))
    <script language="JavaScript" type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                timer: 10000
            });
            Toast.fire({
                icon: 'success',
                class: '',
                title: "{{ session('success') }}"
            });
        });
    </script>


@endif
@if (session('warning'))
    <script language="JavaScript" type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                timer: 10000
            });
            Toast.fire({
                icon: 'warning',
                class: '',
                title: "{{ session('warning') }}"
            });
        });
    </script>


@endif
<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>
