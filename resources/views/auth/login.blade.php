@extends('layouts.app')
@section('title', 'Login')
@section('container')
    <div class="container mb-5">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6 col-xl-5">
            <main class="form-signin">
                <form class="{{ route('login') }}" method="POST">
                  @csrf
                  @method('POST')
                  <div class="text-center">
                    <img class="mb-4 img-fluid w-75" src="{{ asset('img/logo.png') }}" alt="">
                  </div>

                    <div class="form-floating">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email')
                            is-invalid
                        @enderror" id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                        @error('email')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="mt-2 w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </main>
          </div>
        </div>
    </div>
@endsection
