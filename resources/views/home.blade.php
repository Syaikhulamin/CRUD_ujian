@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1 class="mb-4">Beranda</h1>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card text-bg-primary stat-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Siswa</h5>
                        <p class="display-6 mb-0">{{ $totalSiswa }}</p>
                        <small class="opacity-75">Lihat semua data</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('students.index', ['jenis_kelamin' => 'L']) }}" class="text-decoration-none">
                <div class="card text-bg-success stat-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Laki-laki</h5>
                        <p class="display-6 mb-0">{{ $jumlahLakiLaki }}</p>
                        <small class="opacity-75">Filter laki-laki</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('students.index', ['jenis_kelamin' => 'P']) }}" class="text-decoration-none">
                <div class="card text-bg-warning stat-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Perempuan</h5>
                        <p class="display-6 mb-0">{{ $jumlahPerempuan }}</p>
                        <small class="opacity-75">Filter perempuan</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <a href="{{ url('/students') }}" class="btn btn-primary">Lihat Data Siswa</a>
    <a href="{{ url('/students/create') }}" class="btn btn-outline-primary">Tambah Siswa</a>
@endsection
