@extends('layouts.dashboard-admin')
@section('title', 'Panitia')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Panitia</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <a href="{{ route('committee.create') }}" class="btn btn-primary mb-3">Tambahkan Panita Baru</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($committees as $committee)
                        <tr>
                            <th>{{ $committee->name }}</th>
                            <td>{{ $committee->npm }}</td>
                            <td>{{ $committee->position }}</td>
                            <td>{{ $committee->major->name }}</td>
                            <td>{{ $committee->major->faculty->name }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="{{ route('committee.edit', $committee->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('committee.destroy', $committee->id) }}" method="POST">
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
