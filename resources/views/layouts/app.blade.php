<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title') | KPUM</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo" width="45" height="45">
                KPUM Widyatama
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kandidat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home.mpm') }}">MPM</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.presma') }}">Presma</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.senat') }}">Senat</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.ukm') }}">UKM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.panitia') }}">Panitia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Hasil Sementara</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard.mpm') }}">Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="dropdown-item">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div>
        @yield('container')
    </div>
    <div class="container-fluid">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a>
                </li>
                <li class="nav-item"><a href="{{ route('home.mpm') }}" class="nav-link px-2 text-muted">MPM</a>
                </li>
                <li class="nav-item"><a href="{{ route('home.presma') }}"
                        class="nav-link px-2 text-muted">Presma</a></li>
                <li class="nav-item"><a href="{{ route('home.senat') }}"
                        class="nav-link px-2 text-muted">Senat</a></li>
                <li class="nav-item"><a href="{{ route('home.ukm') }}" class="nav-link px-2 text-muted">UKM</a>
                </li>
            </ul>
            <p class="text-center text-muted">© 2021 KPUM Widyatama</p>
        </footer>
    </div>
</body>

</html>
