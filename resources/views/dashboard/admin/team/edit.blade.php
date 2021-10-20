@extends('layouts.dashboard-admin')
@section('title', 'Pasangan Calon')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Edit Pasangan Calon</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('team.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" hidden name="id" value="{{ $team->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" value="{{ old('name') ? old('name') : $team->name }}" class="form-control @error('name')
                    is-invalid
                @enderror" name="name" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="team" class="form-label">Fakultas</label>
                <select class="form-select" name="organization_id">
                    <option selected></option>
                    @foreach ($organizations as $organization)
                        <option @if (old('organization_id') == $organization->id || $team->organization_id == $organization->id)
                            selected
                        @endif value="{{ $organization->id }}">
                            {{ $organization->name }}</option>
                    @endforeach
                </select>
                @error('organization_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
