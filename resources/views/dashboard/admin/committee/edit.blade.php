@extends('layouts.dashboard-admin')
@section('title', 'Edit Panitia')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Edit Panitia</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <form action="{{ route('committee.update', $committee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" hidden name="id" value="{{ $committee->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Panitia</label>
                <input type="text" value="{{ old('name') ? old('name') : $committee->name }}"
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
                <input type="number" value="{{ old('npm') ? old('npm') : $committee->npm }}"
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
                    <option @if ($committee->poisiton == 'Ketua Pelaksana' || old('position') == 'Ketua Pelaksana')
                        selected
                        @endif value="Ketua Pelaksana">Ketua Pelaksana</option>
                    <option @if ($committee->poisiton == 'Wakil Ketua Pelaksana' || old('position') == 'Wakil Ketua Pelaksana')
                        selected
                        @endif value="Wakil Ketua Pelaksana">Wakil Ketua Pelaksana</option>
                    <option @if ($committee->poisiton == 'Sekretaris' || old('position') == 'Sekretaris')
                        selected
                        @endif value="Sekretaris">Sekretaris</option>
                    <option @if ($committee->poisiton == 'Bendahara' || old('position') == 'Bendahara')
                        selected
                        @endif value="Bendahara">Bendahara</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Acara' || old('position') == 'Koordinator Divisi Acara')
                        selected
                        @endif value="Koordinator Divisi Acara">Koordinator Divisi Acara</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Acara' || old('position') == 'Wakil Koordinator Divisi Acara')
                        selected
                        @endif value="Wakil Koordinator Divisi Acara">Wakil Koordinator Divisi Acara</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Dekorasi' || old('position') == 'Koordinator Divisi Dekorasi')
                        selected
                        @endif value="Koordinator Divisi Dekorasi">Koordinator Divisi Dekorasi</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Dekorasi' || old('position') == 'Wakil Koordinator Divisi Dekorasi')
                        selected
                        @endif value="Wakil Koordinator Divisi Dekorasi">Wakil Koordinator Divisi Dekorasi</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Humas' || old('position') == 'Koordinator Divisi Humas')
                        selected
                        @endif value="Koordinator Divisi Humas">Koordinator Divisi Humas</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Humas' || old('position') == 'Wakil Koordinator Divisi Humas')
                        selected
                        @endif value="Wakil Koordinator Divisi Humas">Wakil Koordinator Divisi Humas</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Logistik' || old('position') == 'Koordinator Divisi Logistik')
                        selected
                        @endif value="Koordinator Divisi Logistik">Koordinator Divisi Logistik</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Logistik' || old('position') == 'Wakil Koordinator Divisi Logistik')
                        selected
                        @endif value="Wakil Koordinator Divisi Logistik">Wakil Koordinator Divisi Logistik</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Publikasi dan Dokumentasi' || old('position') == 'Koordinator Divisi Publikasi dan Dokumentasi')
                        selected
                        @endif value="Koordinator Divisi Publikasi dan Dokumentasi">Koordinator Divisi Publikasi dan Dokumentasi</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Publikasi' || old('position') == 'Wakil Koordinator Divisi Publikasi')
                        selected
                        @endif value="Wakil Koordinator Divisi Publikasi">Wakil Koordinator Divisi Publikasi</option>
                    <option @if ($committee->poisiton == 'Koordinator Divisi Teknologi Informasi' || old('position') == 'Koordinator Divisi Teknologi Informasi')
                        selected
                        @endif value="Koordinator Divisi Teknologi Informasi">Koordinator Divisi Teknologi Informasi</option>
                    <option @if ($committee->poisiton == 'Wakil Koordinator Divisi Teknologi Informasi' || old('position') == 'Wakil Koordinator Divisi Teknologi Informasi')
                        selected
                        @endif value="Wakil Koordinator Divisi Teknologi Informasi">Wakil Koordinator Divisi Teknologi Informasi</option>
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
                        <option @if (old('major_id') == $major->id || $committee->major_id == $major->id)
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
                <label for="path" class="form-label">Foto Kandidat</label>
                <input type="file" value="{{ $committee->path }}"
                    class="form-control @error('path')
                    is-invalid
                @enderror" name="path"
                    id="path">
                @error('path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
