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
                            <a class="nav-link @if ($active == 'home')
                                active
                            @endif"
                                aria-current="page" href="{{ route('dashboard.home') }}">Home</a>
                        </li>
                        @if ($config[0]->mpm)
                            <li class="nav-item">
                                <a class="nav-link @if ($active == 'mpm')
                                active
                            @endif"
                                    aria-current="page" href="{{ route('dashboard.mpm') }}">MPM</a>
                            </li>
                        @endif
                        @if ($config[0]->presma)
                            <li class="nav-item">
                                <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                    href="{{ route('dashboard.presma') }}">Presma</a>
                            </li>
                        @endif
                        @if ($config[0]->senat)
                            <li class="nav-item">
                                <a class="nav-link @if ($active == 'senat')
                                active
                            @endif"
                                    href="{{ route('dashboard.senat') }}">Senat</a>
                            </li>
                        @endif
                        @if ($config[0]->ukm)
                            <li class="nav-item" >
                                @yield('ukm')
                            </li>
                        @endif
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
        <div class="container-fluid">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="{{ route('home') }}"
                            class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('home.mpm') }}"
                            class="nav-link px-2 text-muted">MPM</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('home.presma') }}"
                            class="nav-link px-2 text-muted">Presma</a></li>
                    <li class="nav-item"><a href="{{ route('home.senat') }}"
                            class="nav-link px-2 text-muted">Senat</a></li>
                    <li class="nav-item"><a href="{{ route('home.ukm') }}"
                            class="nav-link px-2 text-muted">UKM</a>
                    </li>
                </ul>
                <p class="text-center text-muted">© 2021 KPUM Widyatama</p>
            </footer>
        </div>
    </div>
</body>

</html>
