@extends('layouts.dashboard-admin')
@section('title', 'Timeline')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Edit Timeline</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('timeline.update', $timeline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" hidden name="id" value="{{ $timeline->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kegiatan</label>
                <input type="text" value="{{ old('name') ? old('name') : $timeline->name }}" class="form-control @error('name')
                    is-invalid
                @enderror" name="name" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deksripsi Kegiatan</label>
                <input type="text" value="{{ old('desc') ? old('desc') : $timeline->desc }}" class="form-control @error('desc')
                    is-invalid
                @enderror" name="desc" id="desc">
                @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="from" class="form-label">Dari</label>
                <input type="date" value="{{ old('from') ? old('from') : $timeline->from }}" class="form-control @error('from')
                    is-invalid
                @enderror" name="from" id="from">
                @error('from')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">Sampai</label>
                <input type="date" value="{{ old('to') ? old('to') : $timeline->to }}" class="form-control @error('to')
                    is-invalid
                @enderror" name="to" id="to">
                @error('to')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
