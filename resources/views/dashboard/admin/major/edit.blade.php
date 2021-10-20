@extends('layouts.dashboard-admin')
@section('title', 'Program Studi')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Edit Program Studi</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('major.update', $major->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" hidden name="id" value="{{ $major->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" value="{{ old('name') ? old('name') : $major->name }}" class="form-control @error('name')
                    is-invalid
                @enderror" name="name" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="major" class="form-label">Fakultas</label>
                <select class="form-select" name="faculty_id">
                    <option selected></option>
                    @foreach ($faculties as $faculty)
                        <option @if (old('faculty_id') == $faculty->id || $major->faculty_id == $faculty->id)
                            selected
                        @endif value="{{ $faculty->id }}">
                            {{ $faculty->name }}</option>
                    @endforeach
                </select>
                @error('faculty_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
