<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title') | KPUM</title>
    <style>
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            display: flex;
            flex-wrap: nowrap;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .b-example-divider {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }

        .dropdown-toggle {
            outline: 0;
        }

        .nav-flush .nav-link {
            border-radius: 0;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }

        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
        }

        .btn-toggle[aria-expanded="true"] {
            color: rgba(0, 0, 0, .85);
        }

        .btn-toggle[aria-expanded="true"]::before {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            margin-left: 1.25rem;
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #d2f4ea;
        }

        .scrollarea {
            overflow-y: auto;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .lh-tight {
            line-height: 1.25;
        }

    </style>
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
                            <a class="nav-link @if ($active == 'mpm')
                                active
                            @endif"
                                aria-current="page" href="{{ route('dashboard.mpm') }}">MPM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'presma')
                                active
                            @endif"
                                href="{{ route('dashboard.presma') }}">Presma</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($active == 'senat')
                                active
                            @endif"
                                href="{{ route('dashboard.senat') }}">Senat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">UKM</a>
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
        @if ($active == 'mpm')
            @if ($isVoteMPM)
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            Anda telah menggunakan hak suara anda! <strong>Terimakasih.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat MPM</h1>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="container mt-4">
                        <form action="{{ route('vote.mpm') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row justify-content-center">
                                @foreach ($candidates as $candidate)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="card mb-3 shadow">
                                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                class="card-img-top img-fluid" alt="kandidat_mpm">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $candidate->name }}</h5>
                                                <p class="card-text">{{ $candidate->npm }}</p>
                                                <p class="card-text">{{ $candidate->major->name }} -
                                                    {{ $candidate->major->faculty->name }}</p>
                                                @if ($candidate->team->id == $dataVoteMPM->team_id)
                                                    <input class="form-check-input" type="radio"
                                                        value="{{ $candidate->team->id }}" name="vote" id="vote"
                                                        checked style="width:50px;height:50px;">
                                                @else
                                                    <input class="form-check-input" type="radio"
                                                        value="{{ $candidate->team->id }}" name="vote" id="vote"
                                                        disabled style="width:50px;height:50px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary disabled">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat MPM</h1>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="container mt-4">
                        <form action="{{ route('vote.mpm') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row justify-content-center">
                                @foreach ($candidates as $candidate)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="card mb-3 shadow">
                                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                class="card-img-top img-fluid" alt="kandidat_mpm">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $candidate->name }}</h5>
                                                <p class="card-text">{{ $candidate->npm }}</p>
                                                <p class="card-text">{{ $candidate->major->name }} -
                                                    {{ $candidate->major->faculty->name }}</p>
                                                <input class="form-check-input" style="width:50px;height:50px;"
                                                    type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                    id="vote">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @elseif($active == 'presma')
            @if ($isVotePresma)
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            Anda telah menggunakan hak suara anda! <strong>Terimakasih.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat Presma</h1>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('vote.presma') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @foreach ($grouped as $key => $candidates)
                                    <div class="card shadow mb-4">
                                        <div class="card-header">
                                            {{ $key }}
                                        </div>
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                                @foreach ($candidates as $candidate)
                                                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                        <div class="card mb-3">
                                                            <img src="https://source.unsplash.com/400x500" width="400"
                                                                height="500" class="card-img-top img-fluid"
                                                                alt="kandidat_Presma">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">{{ $candidate->name }}
                                                                </h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    {{ $candidate->npm }}
                                                                </h6>
                                                                <p class="card-text">{{ $candidate->position }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $candidate->major->name }} -
                                                                    {{ $candidate->major->faculty->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if ($candidate->team->id == $dataVotePresma->team_id)
                                                <input class="form-check-input" style="width:50px;height:50px;"
                                                    type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                    id="vote" checked>
                                            @else
                                                <input class="form-check-input" style="width:50px;height:50px;"
                                                    type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                    id="vote" disabled>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <button class="btn btn-primary" type="submit" disabled>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat Presma</h1>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('vote.presma') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @foreach ($grouped as $key => $candidates)
                                    <div class="card shadow mb-4">
                                        <div class="card-header">
                                            {{ $key }}
                                        </div>
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                                @foreach ($candidates as $candidate)
                                                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                        <div class="card mb-3">
                                                            <img src="https://source.unsplash.com/400x500" width="400"
                                                                height="500" class="card-img-top img-fluid"
                                                                alt="kandidat_Presma">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">{{ $candidate->name }}
                                                                </h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    {{ $candidate->npm }}
                                                                </h6>
                                                                <p class="card-text">{{ $candidate->position }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $candidate->major->name }} -
                                                                    {{ $candidate->major->faculty->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <input class="form-check-input" style="width:50px;height:50px;"
                                                type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                id="vote">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @elseif($active == 'senat')
            @if ($isVoteSenat)
                <div class="container">
                    <div class="row">
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            Anda telah menggunakan hak suara anda! <strong>Terimakasih.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat Senat</h1>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('vote.senat') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @foreach ($grouped as $key => $candidates)
                                    <div class="card shadow mb-4">
                                        <div class="card-header">
                                            {{ $key }}
                                        </div>
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                                @foreach ($candidates as $candidate)
                                                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                        <div class="card mb-3">
                                                            <img src="https://source.unsplash.com/400x500" width="400"
                                                                height="500" class="card-img-top img-fluid"
                                                                alt="kandidat_Presma">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">{{ $candidate->name }}
                                                                </h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    {{ $candidate->npm }}
                                                                </h6>
                                                                <p class="card-text">{{ $candidate->position }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $candidate->major->name }} -
                                                                    {{ $candidate->major->faculty->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if ($candidate->team->id == $dataVoteSenat->team_id)
                                                <input class="form-check-input" style="width:50px;height:50px;"
                                                    type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                    id="vote" checked>
                                            @else
                                                <input class="form-check-input" style="width:50px;height:50px;"
                                                    type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                    id="vote" disabled>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <button class="btn btn-primary disabled" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                            <h1 class="display-5 mb-0">Kandidat Senat</h1>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('vote.senat') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @foreach ($grouped as $key => $candidates)
                                    <div class="card shadow mb-4">
                                        <div class="card-header">
                                            {{ $key }}
                                        </div>
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <div
                                                class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                                                @foreach ($candidates as $candidate)
                                                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                        <div class="card mb-3">
                                                            <img src="https://source.unsplash.com/400x500" width="400"
                                                                height="500" class="card-img-top img-fluid"
                                                                alt="kandidat_Presma">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">{{ $candidate->name }}
                                                                </h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    {{ $candidate->npm }}
                                                                </h6>
                                                                <p class="card-text">{{ $candidate->position }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $candidate->major->name }} -
                                                                    {{ $candidate->major->faculty->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <input class="form-check-input" style="width:50px;height:50px;"
                                                type="radio" value="{{ $candidate->team->id }}" name="vote"
                                                id="vote">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @endif
    </div>
</body>

</html>
