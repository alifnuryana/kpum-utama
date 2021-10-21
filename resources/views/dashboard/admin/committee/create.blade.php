@extends('layouts.dashboard-admin')
@section('title', 'Panita')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Tambahkan Panitia</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('committee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Panitia</label>
                <input type="text" value="{{ old('name') }}"
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
                <input type="number" value="{{ old('npm') }}"
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
                    <option selected></option>
                    <option {{ old('position') == 'Ketua Pelaksana' ? 'selected' : '' }} value="Ketua Pelaksana">Ketua Pelaksana</option>
                    <option {{ old('position') == 'Wakil Ketua Pelaksana' ? 'selected' : '' }} value="Wakil Ketua Pelaksana">Wakil Ketua Pelaksana</option>
                    <option {{ old('position') == 'Sekretaris' ? 'selected' : '' }} value="Sekretaris">Sekretaris</option>
                    <option {{ old('position') == 'Bendahara' ? 'selected' : '' }} value="Bendahara">Bendahara</option>
                    <option {{ old('position') == 'Koordinator Divisi Acara' ? 'selected' : '' }} value="Koordinator Divisi Acara">Koordinator Divisi Acara</option>
                    <option {{ old('position') == 'Wakil Koordinator Divisi Acara' ? 'selected' : '' }} value="Wakil Koordinator Divisi Acara">Wakil Koordinator Divisi Acara</option>
                    <option {{ old('position') == 'Koordinator Divisi Dekorasi' ? 'selected' : '' }} value="Koordinator Divisi Dekorasi">Koordinator Divisi Dekorasi</option>
                    <option {{ old('position') == 'Wakil Koordinator Divisi Dekorasi' ? 'selected' : '' }} value="Wakil Koordinator Divisi Dekorasi">Wakil Koordinator Divisi Dekorasi</option>
                    <option {{ old('position') == 'Koordinator Divisi Humas' ? 'selected' : '' }} value="Koordinator Divisi Humas">Koordinator Divisi Humas</option>
                    <option {{ old('position') == 'Wakil Koordinator Divisi Humas' ? 'selected' : '' }} value="Wakil Koordinator Divisi Humas">Wakil Koordinator Divisi Humas</option>
                    <option {{ old('position') == 'Koordinator Divisi Logistik' ? 'selected' : '' }} value="Koordinator Divisi Logistik">Koordinator Divisi Logistik</option>
                    <option {{ old('position') == 'Wakil koordinator Divisi Logistik' ? 'selected' : '' }} value="Wakil koordinator Divisi Logistik">Wakil koordinator Divisi Logistik</option>
                    <option {{ old('position') == 'Koordinator Publikasi dan Dokumentasi' ? 'selected' : '' }} value="Koordinator Publikasi dan Dokumentasi">Koordinator Publikasi dan Dokumentasi</option>
                    <option {{ old('position') == 'Wakil Koordinator Publikasi dan Dokumentasi' ? 'selected' : '' }} value="Wakil Koordinator Publikasi dan Dokumentasi">Wakil Koordinator Publikasi dan Dokumentasi</option>
                    <option {{ old('position') == 'Koordinator Teknologi Informasi' ? 'selected' : '' }} value="Koordinator Teknologi Informasi">Koordinator Teknologi Informasi</option>
                    <option {{ old('position') == 'Wakil Koordinator Teknologi Informasi' ? 'selected' : '' }} value="Wakil Koordinator Teknologi Informasi">Wakil Koordinator Teknologi Informasi</option>
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
                        <option {{ old('major_id') == $major->id ? 'selected' : '' }} value="{{ $major->id }}">
                            {{ $major->name }}</option>
                    @endforeach
                </select>
                @error('major_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="path" class="form-label">Foto Kandidat</label>
                <input type="file" value="{{ old('path') }}"
                    class="form-control @error('path')
                    is-invalid
                @enderror" name="path"
                    id="path">
                @error('path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
