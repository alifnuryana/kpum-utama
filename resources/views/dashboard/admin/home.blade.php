@extends('layouts.dashboard-admin')
@section('title', auth()->user()->name)
@section('container')
    <div class="container">
        <div class="row d-flex mt-5 justify-content-evenly gap-2 align-items-center">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card p-3 shadow bg-success text-white">
                    <div class="card-title">
                        <strong>Mahasiswa Terdaftar</strong>
                    </div>
                    <h5>{{ count($students) - 1 }} Mahasiswa</h5>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card p-3 shadow bg-warning text-white">
                    <div class="card-title">
                        <strong>Jumlah Kandidat</strong>
                    </div>
                    <h5>{{ count($candidates) }} Kandidat</h5>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card p-3 shadow bg-danger text-white">
                    <div class="card-title">
                        <strong>Total Vote</strong>
                    </div>
                    <h5>{{ count($votes) }} Vote</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-5">
            <h4>Data Voting Terbaru</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">LK/OK</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($votes as $vote)
                        <tr>
                            <td>{{ $vote->student->name }}</td>
                            <td>{{ $vote->team->organization->name }}</td>
                            <td>{{ $vote->team->name }}</td>
                            <td>{{ $vote->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
