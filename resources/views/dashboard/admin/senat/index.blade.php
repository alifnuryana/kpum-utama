@extends('layouts.dashboard-admin')
@section('title', 'Kandidat Senat')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Kandidat Senat</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <a href="{{ route('senat.create') }}" class="btn btn-primary mb-3">Tambahkan Kandidat Senat Baru</a>
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
                    @foreach ($senats as $senat)
                        <tr>
                            <th>{{ $senat->name }}</th>
                            <td>{{ $senat->npm }}</td>
                            <td>{{ $senat->position }}</td>
                            <td>{{ $senat->major->name }}</td>
                            <td>{{ $senat->major->faculty->name }}</td>
                            <td>{{ $senat->team->name }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="{{ route('senat.edit', $senat->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('senat.destroy', $senat->id) }}" method="POST">
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
