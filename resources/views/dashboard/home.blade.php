@extends('layouts.dashboard')
@section('title', auth()->user()->name)
@section('ukm')
    @if (count($listUKM) > 0)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @if ($active != 'mpm' && $active != 'senat' && $active != 'presma')
            active
        @endif"" href="
                #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                UKM
            </a>
            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                @foreach ($listUKM as $UKM)
                    <li><a class="dropdown-item @if ($active != 'mpm' && $active != 'senat' && $active != 'presma')
                        active
                    @endif""
                                        href="
                            {{ route('dashboard.ukm', strtolower(str_replace(' ', '-', $UKM))) }}">{{ $UKM }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endif
@endsection
@section('container')
    @if ($active == 'home')
        <div class="container">
            <div class="row d-flex vh-100 justify-content-center align-items-center">
                <div class="col-md-9 col-lg-8 col-xl-7">
                    <div class="card">
                        <div class="card-body shadow">
                            <p class="mb-0">Selamat Datang <strong>Alif Nuryana</strong></p>
                            <hr>
                            <ul class="list-group text-center">
                                <li class="list-group-item">Alif Nuryana</li>
                                <li class="list-group-item">0620101052</li>
                                <li class="list-group-item">Teknik Informatika</li>
                                <li class="list-group-item">Fakultas Teknik</li>
                                <li class="list-group-item">
                                    @foreach ($listUKM as $ukm)
                                        <span class="badge rounded-pill bg-primary">{{ $ukm }}</span>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($active == 'mpm')
        @if ($isVoteMPM)
            <div class="container">
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        Anda telah menggunakan hak suara anda! <strong>Terimakasih.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                                    value="{{ $candidate->team->id }}" name="vote" id="vote" checked
                                                    style="width:50px;height:50px;">
                                            @else
                                                <input class="form-check-input" type="radio"
                                                    value="{{ $candidate->team->id }}" name="vote" id="vote" disabled
                                                    style="width:50px;height:50px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <button class="btn btn-primary disabled">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @elseif($grouped->isEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat Senat</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4 text-center">
                <h4 class="display-7 mt-2">Tidak Ada Calon Kandidat</h4>
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
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote">
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" checked>
                                        @else
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" disabled>
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
        @elseif($grouped->isEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat Presma</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4 text-center">
                <h4 class="display-7 mt-2">Tidak Ada Calon Kandidat</h4>
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
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                        <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                            value="{{ $candidate->team->id }}" name="vote" id="vote">
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" checked>
                                        @else
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" disabled>
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
        @elseif($grouped->isEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat Senat</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4 text-center">
                <h4 class="display-7 mt-2">Tidak Ada Calon Kandidat</h4>
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
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                        <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                            value="{{ $candidate->team->id }}" name="vote" id="vote">
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
    @elseif($active != 'mpm' || $active != 'presma' || $active != 'senat')
        @if ($isVoteUKM)
            <div class="container">
                <div class="row">
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        Anda telah menggunakan hak suara anda! <strong>Terimakasih.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat {{ $name }}</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <form action="{{ route('vote.ukm', $active) }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12">
                            @foreach ($grouped as $key => $candidates)
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        {{ $key }}
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                        @if ($candidate->team->id == $dataVoteUKM->team_id)
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" checked>
                                        @else
                                            <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                                value="{{ $candidate->team->id }}" name="vote" id="vote" disabled>
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
        @elseif($grouped->isEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat {{ $name }}</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4 text-center">
                <h4 class="display-7 mt-2">Tidak Ada Calon Kandidat</h4>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-primary text-white text-center shadow p-2 mt-4">
                        <h1 class="display-5 mb-0">Kandidat {{ $name }}</h1>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <form action="{{ route('vote.ukm', $active) }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12">
                            @foreach ($grouped as $key => $candidates)
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        {{ $key }}
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
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
                                        <input class="form-check-input" style="width:50px;height:50px;" type="radio"
                                            value="{{ $candidate->team->id }}" name="vote" id="vote">
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
@endsection
