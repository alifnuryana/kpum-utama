@extends('layouts.app')
@section('title', 'Register')
@section('container')
    <div class="container mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <main class="form-signin">
                    <form class="{{ route('register') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="text-center">
                            <img class="mb-4 img-fluid w-75" src="{{ asset('img/logo.png') }}" alt="">
                        </div>
                        {{-- NPM --}}
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="number" value="{{ old('npm') }}"
                                class="form-control @error('npm')
                                is-invalid
                            @enderror"
                                id="npm" name="npm">
                            @error('npm')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End NPM --}}
                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End Name --}}
                        {{-- Major --}}
                        <div class="mb-3">
                            <label for="major" class="form-label">Program Studi</label>
                            <select class="form-select" name="major_id">
                                <option selected></option>
                                @foreach ($majors as $major)
                                    <option {{ old('major_id') == $major->id ? 'selected' : '' }}
                                        value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            @error('major')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End Major --}}
                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                placeholder="example@widyatama.ac.id" id="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End Email --}}
                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                id="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- End Password --}}
                        {{-- UKM --}}
                        <div class="mb-3">
                            <label for="ukm" class="form-label">UKM</label>
                            <div class="d-flex flex-wrap align-items-center justify-content-start">
                                @foreach ($organizations as $organization)
                                    @if ($organization->name == 'MPM' || $organization->name == 'Presma' || $organization->name == 'Senat')

                                    @else
                                        <div class="col-5">
                                            <div class="form-check">
                                                <input class="form-check-input" name="ukm[]" type="checkbox"
                                                    value="{{ $organization->name }}" id="{{ $organization->name }}">
                                                <label class="form-check-label" for="{{ $organization->name }}">
                                                    {{ $organization->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Kewirausahaan"
                                            id="Kewirausahaan">
                                        <label class="form-check-label" for="Kewirausahaan">
                                            Kewirausahaan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Taekwondo"
                                            id="Taekwondo">
                                        <label class="form-check-label" for="Taekwondo">
                                            Taekwondo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox"
                                            value="Resimen Mahasiswa" id="Resimen Mahasiswa">
                                        <label class="form-check-label" for="Resimen Mahasiswa">
                                            Resimen Mahasiswa
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Unbol"
                                            id="Unbol">
                                        <label class="form-check-label" for="Unbol">
                                            Unbol
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="PKM" id="PKM">
                                        <label class="form-check-label" for="PKM">
                                            PKM
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Japan Club"
                                            id="Japan Club">
                                        <label class="form-check-label" for="Japan Club">
                                            Japan Club
                                        </label>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="ISC" id="ISC">
                                        <label class="form-check-label" for="ISC">
                                            ISC
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Bulu Tangkis"
                                            id="Bulu Tangkis">
                                        <label class="form-check-label" for="Bulu Tangkis">
                                            Bulu Tangkis
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="BSTC" id="BSTC">
                                        <label class="form-check-label" for="BSTC">
                                            BSTC
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Basket"
                                            id="Basket">
                                        <label class="form-check-label" for="Basket">
                                            Basket
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Sentra"
                                            id="Sentra">
                                        <label class="form-check-label" for="Sentra">
                                            Sentra
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="An-Naafi"
                                            id="An-Naafi">
                                        <label class="form-check-label" for="An-Naafi">
                                            An-Naafi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="ukm[]" type="checkbox" value="Tarung Drajat"
                                            id="Tarung Drajat">
                                        <label class="form-check-label" for="Tarung Drajat">
                                            Tarung Drajat
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                                {{-- End UKM --}}
                                <button class="mt-2 w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
