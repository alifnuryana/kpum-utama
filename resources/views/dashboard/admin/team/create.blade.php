@extends('layouts.dashboard-admin')
@section('title', 'Pasangan Calon')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Tambahkan Pasangan Calon</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('team.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pasangan Calon</label>
                <input type="text" placeholder="Contoh : Paslon MPM 1" value="{{ old('name') }}"
                    class="form-control @error('name')
                    is-invalid
                @enderror" name="name"
                    id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="team" class="form-label">UKM</label>
                <select class="form-select" name="organization_id">
                    <option selected></option>
                    @foreach ($organizations as $organization)
                        <option {{ old('organization_id') == $organization->id ? 'selected' : '' }} value="{{ $organization->id }}">
                            {{ $organization->name }}</option>
                    @endforeach
                </select>
                @error('organization_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
