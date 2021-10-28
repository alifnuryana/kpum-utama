@extends('layouts.dashboard-admin')
@section('title', 'Kandidat UKM')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Kandidat UKM</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <a href="{{ route('ukm.create') }}" class="btn btn-primary mb-3">Tambahkan Kandidat UKM Baru</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Pasangan Calon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ukms as $ukm)
                        <tr>
                            <th>{{ $ukm->name }}</th>
                            <td>{{ $ukm->npm }}</td>
                            <td>{{ $ukm->position }}</td>
                            <td>{{ $ukm->major->name }}</td>
                            <td>{{ $ukm->major->faculty->name }}</td>
                            <td>{{ $ukm->team->name }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="{{ route('ukm.edit', $ukm->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('ukm.destroy', $ukm->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
