<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perikanan - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


</head>

<body class="bg-gradient-primary" style="background-image: url({{ asset('img/bg.png') }}); background-position: center;">

    @include('sweetalert::alert')


    @include('template.nav_home')


    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-6" style="margin-top: 200px;">
                <img src="{{ asset('img/fish.png') }}" width="400px" alt="">
            </div>
            <div class="col-lg-6" style="margin-top: 300px; margin-left: -8rem;">
                <h3 class="text-dark" style="font-weight: 800;">Selamat pagi kak</h3>
                <h3 class="text-dark" style="font-weight: 800;">Di Aplikasi Sistem Informasi Perikanan Tangkap</h3>
                <h3 class="text-dark" style="font-weight: 800;">Dinas Perikanan Kabupaten Cilacap</h3>
            </div>
        </div>


    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>





</body>

</html>
