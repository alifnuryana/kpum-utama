<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title') | KPUM</title>
</head>

<body>
    <div class="wrapper w-full">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a class="navbar-brand" href="#">KPUM UTAMA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                href="{{ route('dashboard.presma') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Sistem Pemilu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Hero</a></li>
                                <li><a class="dropdown-item" href="#">Timeline</a></li>
                                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                href="{{ route('dashboard.presma') }}">Pasangan Calon</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Kandidat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">MPM</a></li>
                                <li><a class="dropdown-item" href="#">Presma</a></li>
                                <li><a class="dropdown-item" href="#">UKM</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                href="{{ route('dashboard.presma') }}">UKM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                href="{{ route('dashboard.presma') }}">Fakultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'senat')
                                active
                            @endif"
                                href="{{ route('major.index') }}">Program Studi</a>
                        </li>
                        <li class="nav-item">
                            @yield('ukm')
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
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
                </div>
            </div>
        </nav>
        <div>
            @yield('container')
        </div>
    </div>
</body>

</html>
