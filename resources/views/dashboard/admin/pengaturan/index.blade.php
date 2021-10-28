@extends('layouts.dashboard-admin')
@section('title', 'Pengaturan')
@section('container')
    <div class="container pt-md-3 mt-5 pt-5">
        <h3 class="display-6 fw-bold lh-1">Pengaturan</h3>
        <hr>
        <form action="{{ route('pengaturan.update', 1) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="mpm" class="form-label">MPM</label>
                <select class="form-select" name="mpm">
                    @if ($data->mpm)
                        <option selected value="1">Buka</option>
                        <option value="0">Tutup</option>
                    @else
                        <option value="1">Buka</option>
                        <option selected value="0">Tutup</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="presma" class="form-label">Presma</label>
                <select class="form-select" name="presma">
                    @if ($data->presma)
                        <option selected value="1">Buka</option>
                        <option value="0">Tutup</option>
                    @else
                        <option value="1">Buka</option>
                        <option selected value="0">Tutup</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="senat" class="form-label">Senat</label>
                <select class="form-select" name="senat">
                    @if ($data->senat)
                        <option selected value="1">Buka</option>
                        <option value="0">Tutup</option>
                    @else
                        <option value="1">Buka</option>
                        <option selected value="0">Tutup</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="ukm" class="form-label">Ukm</label>
                <select class="form-select" name="ukm">
                    @if ($data->ukm)
                        <option selected value="1">Buka</option>
                        <option value="0">Tutup</option>
                    @else
                        <option value="1">Buka</option>
                        <option selected value="0">Tutup</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="register" class="form-label">Register</label>
                <select class="form-select" name="register">
                    @if ($data->register)
                        <option selected value="1">Buka</option>
                        <option value="0">Tutup</option>
                    @else
                        <option value="1">Buka</option>
                        <option selected value="0">Tutup</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
