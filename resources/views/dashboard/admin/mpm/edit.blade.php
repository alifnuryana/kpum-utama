@extends('layouts.dashboard-admin')
@section('title', 'Edit Kandidat MPM')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Edit Kandidat</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('mpm.update', $mpm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" hidden name="id" value="{{ $mpm->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kandidat</label>
                <input type="text" value="{{ old('name') ? old('name') : $mpm->name }}"
                    class="form-control @error('name')
                    is-invalid
                @enderror" name="name"
                    id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="number" value="{{ old('npm') ? old('npm') : $mpm->npm }}"
                    class="form-control @error('npm')
                    is-invalid
                @enderror" name="npm"
                    id="npm">
                @error('npm')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Posisi</label>
                <select class="form-select" name="position">
                    <option @if ($mpm->poisiton == 'Ketua')
                        selected
                        @endif value="Ketua">Ketua</option>
                    <option @if ($mpm->position == 'Wakil')
                        selected
                        @endif value="Wakil">Wakil</option>
                </select>
                @error('position')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="major" class="form-label">Program Studi</label>
                <select class="form-select" name="major_id">
                    <option selected></option>
                    @foreach ($majors as $major)
                        <option @if (old('major_id') == $major->id || $mpm->major_id == $major->id)
                            selected
                            @endif value="{{ $major->id }}">
                            {{ $major->name }}</option>
                    @endforeach
                </select>
                @error('major_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="team" class="form-label">Pasangan Calon</label>
                <select class="form-select" name="team_id">
                    <option selected></option>
                    @foreach ($teams as $team)
                        <option @if (old('team_id') == $team->id || $mpm->team_id == $team->id)
                            selected
                            @endif value="{{ $team->id }}">
                            {{ $team->name }}</option>
                    @endforeach
                </select>
                @error('team_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="path" class="form-label">Foto Kandidat</label>
                <input type="file"
                value="{{ $mpm->path }}"
                class="form-control @error('path')
                    is-invalid
                @enderror" name="path"
                id="path">
                @error('path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">CV Kandidat</label>
                <input type="file"
                value="{{ $mpm->cv }}"
                class="form-control @error('cv')
                    is-invalid
                @enderror" name="cv"
                    id="cv">
                @error('cv')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
