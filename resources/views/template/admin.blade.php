<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perikanan - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    @yield('style')
</head>

<body id="page-top">
    @include('sweetalert::alert')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-side sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo.png') }}" width="50" height="60" alt="">
                </div>
                {{-- <div class="sidebar-brand-text mx-3">Perikanan </div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">

            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-fish"></i>
                    <span>Produksi Perikanan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('jenis.kapal') }}">Jenis Kapal</a>
                        <a class="collapse-item" href="{{ route('jenis.alat.penangkap') }}">Alat Penangkap Ikan</a>
                        <a class="collapse-item" href="{{ route('jenis.ikan') }}">Jenis Ikan</a>

                    </div>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('jenis.alat.penangkap') }}">
                    <i class="fas fa-toolbox"></i>
                    <span>Jenis Alat Penangkap</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jenis.ikan') }}">
                    <i class="fas fa-fish"></i>
                    <span>Jenis Ikan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jenis.kapal') }}">
                    <i class="fas fa-ship"></i>
                    <span>Jenis Kapal</span></a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="{{ route('kecamatan') }}">
                    <i class="fas fa-map"></i>
                    <span>Wilayah</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('penangkapan') }}">
                    <i class="fas fa-toolbox"></i>
                    <span>Penangkapan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-user"></i>
                    <span>User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.admin') }}">
                    <i class="fas fa-user-secret"></i>
                    <span>Admin</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan') }}">
                    <i class="fas fa-flag"></i>
                    <span>Laporan</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-user-shield"></i>
                    <span>Role</span></a>
            </li> --}}


            <!-- Nav Item - Utilities Collapse Menu -->



            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading"> -->

            <!-- </div> -->

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->


            <!-- Nav Item - Tables -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-side">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-right topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link text-dark d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 class="text-white" style="font-weight: 800 !important;">Sistem Informasi Perikanan Tangkap Dinas Perikanan Kabupaten Cilacap</h4>





                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small">{{ $usx->username }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset($usx->foto) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ $usx->nama }}
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ $usx->email }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('header-content')

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">@yield('content-title')</h6>
                                </div>
                                <div class="card-body">
                                    @yield('content')
                                </div>
                            </div>


                        </div>



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dinas Perikanan Kabupaten Cilacap - Dashboard {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>


    <!-- Page level plugins -->
    {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{  asset('js/demo/chart-area-demo.js')  }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}

    @yield('script')

</body>

</html>
