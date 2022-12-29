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

            <div class="col-lg-8 mx-auto bg-white p-5 text-center rounded" style="margin-top: 200px; margin-left: -8rem; margin-bottom: 5rem;">
                <h3 class="text-dark" style="font-weight: 800;">Contact</h3>
                <h3 class="text-dark" style="font-weight: 800;"> <i class="fa fa-phone"></i> (0282) 534178</h3>
                <hr>
                <h4 class="text-dark" style="font-weight: 800;">Jl. Lkr. Selatan I, Karangmulia, Tegalkamulyan, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah</h4>
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
