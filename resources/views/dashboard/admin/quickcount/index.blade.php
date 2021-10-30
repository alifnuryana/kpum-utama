@extends('layouts.dashboard-admin')
@section('title', 'Hasil Sementara')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Hasil Sementara</h3>
        <hr>
    </div>
    <div class="container mb-5">
        @foreach ($listOrganization as $organization)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $organization->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total suara yang sudah masuk</h5>
                    <div class="progress mb-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            style="width: {{ $dataSuara[$organization->name] }}%"></div>
                    </div>
                    <a href="{{ route('dashboard.admin.hasil', $organization->name) }}" class="btn btn-primary">Lihat
                        Suara</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
