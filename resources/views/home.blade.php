@extends('layouts.app')
@section('title', 'Home')
@section('container')
    {{-- Hero --}}
    <div class="container my-md-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">Komisi Pemilihan Umum Mahasiswa</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                    world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="{{ asset('img/hero.png') }}" alt="" width="720">
            </div>
        </div>
    </div>
    {{-- End Hero --}}
    @if ($active == 'home')
        {{-- Timeline --}}
        <div class="container my-5">
            <div class="container pt-md-5 pt-2">
                <h3 class="display-6 fw-bold lh-1">Rangkaian Kegiatan</h3>
                <hr>
            </div>
            <div class="container">
                @foreach ($timelines as $timeline)
                    <div class="row">
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge rounded-circle bg-light border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col border-end">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $timeline->name }}</h4>
                                    <p class="card-text">{{ $timeline->desc }}</p>
                                    @if ($timeline->from == $timeline->to)
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($timeline->from)->format('d/M/Y') }}
                                        </p>
                                    @else
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($timeline->from)->format('d/M/Y') }} -
                                            {{ \Carbon\Carbon::parse($timeline->to)->format('d/M/Y') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Timeline --}}
    @elseif ($active == 'mpm')
        {{-- MPM --}}
        <div class="container pt-md-3 pt-5">
            <h3 class="display-6 fw-bold lh-1">Kandidat MPM</h3>
            <hr>
        </div>
        <div class="container mt-4">
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
                                <!-- Button trigger modal -->
                                <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#{{ str_replace(' ', '', $candidate->name) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                    {{-- Modal --}}

                    <!-- Modal -->
                    <div class="modal fade" id="{{ str_replace(' ', '', $candidate->name) }}" tabindex="-1"
                        aria-labelledby="{{ str_replace(' ', '', $candidate->name) }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="{{ str_replace(' ', '', $candidate->name) }}Label">
                                        Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                        class="card-img-top img-fluid" alt="kandidat_mpm">
                                    <ul class="list-group mt-2">
                                        <li class="list-group-item">
                                            <h6>Name</h6>
                                            {{ $candidate->name }}
                                        </li>
                                        <li class="list-group-item">
                                            <h6>NPM</h6>
                                            {{ $candidate->npm }}
                                        </li>
                                        <li class="list-group-item">
                                            <h6>Program Studi</h6>
                                            {{ $candidate->major->name }} - {{ $candidate->major->faculty->name }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <a href="#" class="btn btn-danger">Download CV</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal --}}
                @endforeach
            </div>
        </div>
        {{-- End MPM --}}
    @elseif ($active == 'presma')
        {{-- Presma --}}
        <div class="container pt-md-3 pt-5">
            <h3 class="display-6 fw-bold lh-1">Kandidat Presma</h3>
            <hr>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach ($grouped as $key => $candidates)
                        <div class="card shadow mb-5">
                            <div class="card-header">
                                {{ $key }}
                            </div>
                            <div class="card-body d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($candidates as $candidate)
                                    <div class="col-md-6 col-lg-4 col-xl-3 col-12">
                                        <div class="card mb-3">
                                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                class="card-img-top img-fluid" alt="kandidat_Presma">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $candidate->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $candidate->npm }}</h6>
                                                <p class="card-text">{{ $candidate->position }}</p>
                                                <p class="card-text">{{ $candidate->major->name }} -
                                                    {{ $candidate->major->faculty->name }}</p>
                                                <!-- Button trigger modal -->
                                                <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#{{ str_replace(' ', '', $candidate->name) }}">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ str_replace(' ', '', $candidate->name) }}"
                                        tabindex="-1" aria-labelledby="{{ str_replace(' ', '', $candidate->name) }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="{{ str_replace(' ', '', $candidate->name) }}Label">Detail
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                        class="card-img-top img-fluid" alt="kandidat_Presma">
                                                    <ul class="list-group mt-2">
                                                        <li class="list-group-item">
                                                            <h6>Name</h6>
                                                            {{ $candidate->name }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>NPM</h6>
                                                            {{ $candidate->npm }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>Program Studi</h6>
                                                            {{ $candidate->major->name }} -
                                                            {{ $candidate->major->faculty->name }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <a href="#" class="btn btn-danger">Download CV</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- End Presma --}}
    @elseif($active == 'senat')
        {{-- Senat --}}
        <div class="container pt-md-3 pt-5">
            <h3 class="display-6 fw-bold lh-1">Kandidat Senat</h3>
            <hr>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach ($grouped as $key => $candidates)
                        <div class="card shadow mb-5">
                            <div class="card-header">
                                {{ $key }}
                            </div>
                            <div class="card-body d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($candidates as $candidate)
                                    <div class="col-md-6 col-lg-4 col-xl-3 col-12">
                                        <div class="card mb-3">
                                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                class="card-img-top img-fluid" alt="kandidat_Senat">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $candidate->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $candidate->npm }}</h6>
                                                <p class="card-text">{{ $candidate->position }}</p>
                                                <p class="card-text">{{ $candidate->major->name }} -
                                                    {{ $candidate->major->faculty->name }}</p>
                                                <!-- Button trigger modal -->
                                                <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#{{ str_replace(' ', '', $candidate->name) }}">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ str_replace(' ', '', $candidate->name) }}"
                                        tabindex="-1" aria-labelledby="{{ str_replace(' ', '', $candidate->name) }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="{{ str_replace(' ', '', $candidate->name) }}Label">Detail
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                        class="card-img-top img-fluid" alt="kandidat_Senat">
                                                    <ul class="list-group mt-2">
                                                        <li class="list-group-item">
                                                            <h6>Name</h6>
                                                            {{ $candidate->name }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>NPM</h6>
                                                            {{ $candidate->npm }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>Program Studi</h6>
                                                            {{ $candidate->major->name }} -
                                                            {{ $candidate->major->faculty->name }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <a href="#" class="btn btn-danger">Download CV</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- End Senat --}}
    @elseif($active == 'ukm')
        {{-- UKM --}}
        <div class="container pt-md-3 pt-5">
            <h3 class="display-6 fw-bold lh-1">Kandidat UKM</h3>
            <hr>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach ($grouped as $key => $candidates)
                        <div class="card shadow mb-5">
                            <div class="card-header">
                                {{ $key }}
                            </div>
                            <div class="card-body d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($candidates as $candidate)
                                    <div class="col-md-6 col-lg-4 col-xl-3 col-12">
                                        <div class="card mb-3">
                                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                class="card-img-top img-fluid" alt="kandidat_UKM">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $candidate->name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $candidate->npm }}</h6>
                                                <p class="card-text">{{ $candidate->position }}</p>
                                                <p class="card-text">{{ $candidate->major->name }} -
                                                    {{ $candidate->major->faculty->name }}</p>
                                                <!-- Button trigger modal -->
                                                <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#{{ str_replace(' ', '', $candidate->name) }}">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ str_replace(' ', '', $candidate->name) }}"
                                        tabindex="-1" aria-labelledby="{{ str_replace(' ', '', $candidate->name) }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="{{ str_replace(' ', '', $candidate->name) }}Label">Detail
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                                        class="card-img-top img-fluid" alt="kandidat_UKM">
                                                    <ul class="list-group mt-2">
                                                        <li class="list-group-item">
                                                            <h6>Name</h6>
                                                            {{ $candidate->name }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>NPM</h6>
                                                            {{ $candidate->npm }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <h6>Program Studi</h6>
                                                            {{ $candidate->major->name }} -
                                                            {{ $candidate->major->faculty->name }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <a href="#" class="btn btn-danger">Download CV</a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- End UKM --}}
    @elseif($active == 'panitia')
        {{-- Panitia --}}
        <div class="container pt-md-3 pt-5">
            <h3 class="display-6 fw-bold lh-1">Panitia</h3>
            <hr>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                @foreach ($committees as $committee)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card mb-3 shadow">
                            <img src="https://source.unsplash.com/400x500" width="400" height="500"
                                class="card-img-top img-fluid" alt="kandidat_UKM">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $committee->name }}</h5>
                                <p class="card-text">{{ $committee->npm }}</p>
                                <p class="card-text">{{ $committee->position }}</p>
                                <p class="card-text">{{ $committee->major->name }} -
                                    {{ $committee->major->faculty->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Panitia --}}
    @endif
@endsection
