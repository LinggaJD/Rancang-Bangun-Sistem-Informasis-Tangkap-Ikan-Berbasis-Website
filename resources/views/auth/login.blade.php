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
            <div class="col-lg-6 mx-auto mt-5">
                <div class="card mt-5" style="border: 1px solid #222; border-radius: 50px; background: linear-gradient(180deg, #47A7FF 0%, rgba(228, 229, 230, 0.9) 67.19%);">
                    <div class="card-body">
                        <h3 class="text-center" style="color: #222; font-weight: 900; -webkit-text-stroke: 0.5px #fff;">Sistem Informasi Perikanan Tangkap</h3>
                        <h3 class="text-center" style="color: #222; font-weight: 900; -webkit-text-stroke: 0.5px #fff;">Dinas Perikanan Kabupaten Cilacap</h3>
                        <div class="text-center">
                            <img src="{{ asset('img/fish.png') }}" width="150" height="150" alt="">

                            <form action="{{ route('auth.process') }}" method="post" class="mt-5">
                                @csrf
                                <div class="form-group">

                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="username" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="addon-wrapping" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                                    </div>
                                    @error('username')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping1" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="addon-wrapping1" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                                    </div>
                                    @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-info btn-block rounded-pill"><i
                                        class="fa fa-sign-in-alt"></i> Masuk</button>
                                <p class="text-center mt-4 mb-0">&copy; Dinas Perikanan Kabupaten Cilacap</p>
                                <p>{{ date('Y') }}</p>
                            </form>
                        </div>
                    </div>

                </div>
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
