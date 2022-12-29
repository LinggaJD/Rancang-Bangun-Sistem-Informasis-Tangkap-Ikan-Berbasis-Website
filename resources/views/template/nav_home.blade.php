<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" width="50" height="60" class="d-inline-block align-top mr-2" alt="">
        <img src="{{ asset('img/Dinas Perikanan Kabupaten Cilacap.png') }}" width="220"
            class="d-inline-block mt-1 align-top" alt="">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto px-5">
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('auth.home') }}">Home</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('auth.grafik') }}">Grafik</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="{{ route('auth.contact') }}">Contact</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-dark rounded-pill px-3" href="{{ route('auth.index') }}">Login</a>
            </li>

        </ul>

    </div>
</nav>
