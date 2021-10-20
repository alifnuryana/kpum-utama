@extends('layouts.dashboard-admin')
@section('title', 'Timeline')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Timeline</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <a href="{{ route('timeline.create') }}" class="btn btn-primary mb-3">Tambahkan Timeline Baru</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col-2">Deskripsi</th>
                    <th scope="col">Dari Tanggal</th>
                    <th scope="col">Sampai Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timelines as $timeline)
                    <tr>
                        <th>{{ $timeline->name }}</th>
                        <th>{{ $timeline->desc }}</th>
                        <th>{{ $timeline->from }}</th>
                        <th>{{ $timeline->to }}</th>
                        <td>
                            <div class="d-flex align-items-center  gap-1">
                                <a href="{{ route('timeline.edit', $timeline->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('timeline.destroy', $timeline->id) }}" method="POST">
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
@endsection
